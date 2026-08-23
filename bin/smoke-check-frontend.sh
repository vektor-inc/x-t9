#!/usr/bin/env bash
#
# dist テーマを実際にフロント表示し、HTTP 200 が返ることと
# テーマ（x-t9）由来の PHP エラー・警告・注意・非推奨が出ていないことを確認する。
#
# 位置づけ（#479 / 安藤のレビュー指摘を反映）:
#   #478 クラスの不具合（ソースには存在するのに配布パッケージからファイルが欠落する）の
#   検出は bin/check-dist.sh が担う。
#
#   このスクリプトは #478 と同一パターンの再検出手段ではない。実際、#478 の修正では
#   gulpfile.js の修正に加えて functions.php にも is_readable() ガードが入っており、
#   ファイルが欠落していても現在はもう file_get_contents() の PHP Warning を出さず
#   静かに return する。さらにそのコードパスは Snow Monkey Forms プラグインが有効な
#   場合にしか実行されず、CI の wp-env にはこのプラグインを入れていない。そのため、
#   このスクリプトで plugin-support の欠落を再現しても Warning は検出できない
#   （実機で確認済み）。
#
#   このスクリプトの役割は、「テーマを有効化しただけ」では気付けず「実際にページを
#   表示して初めて分かる」テーマ由来の PHP エラー・警告全般を拾う、汎用のセーフティ
#   ネットである。
#
# 検出方法（debug.log 方式を採用した理由）:
#   WP_DEBUG_DISPLAY を無効にし、WP_DEBUG_LOG で debug.log にエラーを集約する方式を採る。
#   レスポンス本文の文字列走査ではなく debug.log を見るのは、
#     - WP_DEBUG_DISPLAY を有効にすると本文中の警告混入で HTTP 200 判定や
#       本文比較が不安定になりやすい
#     - debug.log は WordPress のエラーハンドラが Warning/Notice/Deprecated/Fatal を
#       一貫して書き込む先であり、テンプレート側の出力バッファリングの影響を受けない
#   ためで、より確実に検出できると判断したため。
#
#   コアやプラグイン由来のノイズで CI が不安定にならないよう、
#   ログ行に「テーマのパス（wp-content/themes/x-t9）」を含むものだけを対象にする。
#
# 前提:
#   - `npx wp-env start` 済みで、dist テーマ（x-t9）が有効化されていること
#     （.github/workflows/release.yml の smoke_test ジョブ、または
#     ローカルで同様の手順を踏んだ状態）
#   - SMOKE_BASE_URL 環境変数で wp-env のサイト URL を指定できる
#     （未指定時は wp-env の既定ポート http://localhost:8888。このリポジトリの
#     ローカル運用ルールでポート 9144/9145 を指定している場合は、このデフォルトと
#     食い違うため必ず SMOKE_BASE_URL=http://localhost:9144 のように明示すること）
#
# 使い方（ローカル）:
#   1. .wp-env.override.json に {"port": 9144, "testsPort": 9145} 等を指定して
#      `npx wp-env start` する（※このリポジトリのローカル運用ルールに従うこと）
#   2. `npx wp-env run cli wp theme activate x-t9`
#   3. `SMOKE_BASE_URL=http://localhost:9144 bin/smoke-check-frontend.sh`
#
# 終了コード:
#   0: PASS
#   1: FAIL（HTTP エラー、テーマ由来の PHP エラー/警告の検出、
#      またはログ自体を確認できなかった場合）
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$REPO_ROOT"

THEME_NAME="x-t9"
BASE_URL="${SMOKE_BASE_URL:-http://localhost:8888}"
# wp-env コンテナ内での絶対パス（cli コンテナは wordpress コンテナと
# wp-content を共有するボリュームをマウントしている）。
DEBUG_LOG_PATH="/var/www/html/wp-content/debug.log"

# 確認するページ（クエリ文字列ベースで指定し、パーマリンク設定に依存しないようにする）。
# wp-env が起動時に作成する既定コンテンツ（Hello world! = 投稿ID 1, Sample Page = 固定ページID 2）を利用する。
PATHS=(
	"/"            # フロントページ（front-page.html テンプレート）
	"/?p=1"        # 個別投稿（single.html テンプレート）
	"/?page_id=2"  # 固定ページ（page.html テンプレート）
)

# ------------------------------------------------------------------------
# debug.log をリセットする。
# rm が失敗した場合（権限エラー等）に気付かず前回ログを持ち越すと、次のリクエストの
# 結果に前回分のエラーが混ざって誤検出の元になるため、成功を示すセンチネル文字列
# （RESET_OK）が返ってきたことを確認できないときは FAIL として終了する。
# ------------------------------------------------------------------------
reset_debug_log() {
	local output
	output="$(npx wp-env run cli bash -c "rm -f '${DEBUG_LOG_PATH}' && echo RESET_OK" 2>&1)" || true

	if ! printf '%s\n' "$output" | grep -qx "RESET_OK"; then
		echo "エラー: debug.log をリセットできませんでした（wp-env コンテナへのコマンド実行に失敗した可能性があります）。" >&2
		echo "以下は wp-env run cli の出力です:" >&2
		printf '%s\n' "$output" >&2
		exit 1
	fi
}

# ------------------------------------------------------------------------
# debug.log の内容を取得する。
#
# コンテナ未起動・権限エラー等で確認コマンド自体が失敗したときに「ログが空だった」と
# 誤判定して PASS してしまう（セーフティネットが黙って死ぬ）のを防ぐため、
# test の結果を EXISTS / ABSENT のいずれかのセンチネル文字列として明示的に受け取り、
# どちらでもなければ「確認できなかった」として FAIL する。
# ------------------------------------------------------------------------
read_debug_log() {
	local presence
	presence="$(npx wp-env run cli bash -c "test -f '${DEBUG_LOG_PATH}' && echo EXISTS || echo ABSENT" 2>&1)" || true

	if printf '%s\n' "$presence" | grep -qx "EXISTS"; then
		npx wp-env run cli bash -c "cat '${DEBUG_LOG_PATH}'" 2>&1
		return 0
	fi

	if printf '%s\n' "$presence" | grep -qx "ABSENT"; then
		# debug.log 自体が生成されていない = エラー・警告が一件も無かったことを意味する。
		return 0
	fi

	echo "エラー: debug.log の存在確認ができませんでした（wp-env コンテナが応答しない、権限エラー等の可能性があります）。" >&2
	echo "以下は wp-env run cli の出力です:" >&2
	printf '%s\n' "$presence" >&2
	exit 1
}

reset_debug_log

http_failed=0
for path in "${PATHS[@]}"; do
	url="${BASE_URL}${path}"
	code="$(curl -sS -o /dev/null -w '%{http_code}' \
		--max-time 30 --connect-timeout 10 -L \
		--url "$url" || echo "000")"

	if [ "$code" != "200" ]; then
		echo "FAIL: ${url} が HTTP ${code} を返しました（200 を期待）。" >&2
		if [ "$code" = "404" ] && { [ "$path" = "/?p=1" ] || [ "$path" = "/?page_id=2" ]; }; then
			echo "      wp-env の既定コンテンツ（投稿ID 1 / 固定ページID 2）が変わった可能性があります。" >&2
			echo "      \`npx wp-env run cli wp post list\` で実際の投稿・固定ページ ID を確認してください。" >&2
		fi
		http_failed=1
	else
		echo "OK: ${url} -> HTTP ${code}"
	fi
done

# HTTP チェックが失敗していても、原因調査のため debug.log は必ず確認してログに残す
# （debug.log の確認前に exit すると、500 等の原因が CI ログに一切残らないため）。
#
# read_debug_log() の呼び出しは `log_content="$(read_debug_log)"` のような
# コマンド置換にしない。コマンド置換はサブシェルで実行されるため、関数内で
# エラー時に呼んでいる exit 1 がサブシェルだけを終了させてしまい、本来 FAIL
# させたい親プロセス（このスクリプト自体）に伝播しない。単純なリダイレクト
# （subshell を作らない）でファイルへ書き出すことで exit を正しく伝播させる。
echo "情報: debug.log を確認します。"
log_file="$(mktemp)"
trap 'rm -f "$log_file"' EXIT
read_debug_log > "$log_file"

# テーマ（x-t9）のパスを含む行のみを対象にする。
# コアやプラグイン由来の Deprecated 等のノイズを拾って CI が不安定にならないようにするため。
theme_errors="$(grep -E "PHP (Warning|Notice|Deprecated|Fatal error|Parse error)" "$log_file" | grep -F "themes/${THEME_NAME}" || true)"

if [ -n "$theme_errors" ]; then
	echo "FAIL: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告が検出されました:" >&2
	echo "$theme_errors" >&2
	exit 1
fi

if [ "$http_failed" -ne 0 ]; then
	echo "情報: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告は検出されませんでしたが、上記の HTTP エラーにより FAIL とします。" >&2
	exit 1
fi

echo "OK: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告は検出されませんでした。"
exit 0
