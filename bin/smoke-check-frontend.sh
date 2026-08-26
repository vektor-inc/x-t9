#!/usr/bin/env bash
#
# Actually render the dist theme's frontend, confirm that HTTP 200 is returned, and
# confirm that no PHP error/warning/notice/deprecation attributable to the theme (x-t9)
# was emitted.
# dist テーマを実際にフロント表示し、HTTP 200 が返ることと
# テーマ（x-t9）由来の PHP エラー・警告・注意・非推奨が出ていないことを確認する。
#
# Positioning (#479 / reflects code review feedback):
# 位置づけ（#479 / 安藤のレビュー指摘を反映）:
#   Detecting the #478 class of bug (a file that exists in the source tree but is missing
#   from the distribution package) is the job of bin/check-dist.sh.
#   #478 クラスの不具合（ソースには存在するのに配布パッケージからファイルが欠落する）の
#   検出は bin/check-dist.sh が担う。
#
#   This script is not a re-detection mechanism for that exact same #478 pattern. In fact,
#   the #478 fix added an is_readable() guard in functions.php on top of the gulpfile.js
#   fix, so even when the file is missing, it now silently returns instead of emitting the
#   file_get_contents() PHP Warning. That code path also only runs when the Snow Monkey
#   Forms plugin is active, and CI's wp-env does not install that plugin. So reproducing
#   the missing plugin-support file here will not surface a Warning (confirmed hands-on).
#   このスクリプトは #478 と同一パターンの再検出手段ではない。実際、#478 の修正では
#   gulpfile.js の修正に加えて functions.php にも is_readable() ガードが入っており、
#   ファイルが欠落していても現在はもう file_get_contents() の PHP Warning を出さず
#   静かに return する。さらにそのコードパスは Snow Monkey Forms プラグインが有効な
#   場合にしか実行されず、CI の wp-env にはこのプラグインを入れていない。そのため、
#   このスクリプトで plugin-support の欠落を再現しても Warning は検出できない
#   （実機で確認済み）。
#
#   This script's job is to be a general-purpose safety net that catches theme-originated
#   PHP errors/warnings across the board that "only show up once a page is actually
#   rendered" and would not be noticed by just activating the theme.
#   このスクリプトの役割は、「テーマを有効化しただけ」では気付けず「実際にページを
#   表示して初めて分かる」テーマ由来の PHP エラー・警告全般を拾う、汎用のセーフティ
#   ネットである。
#
# Detection method (why the debug.log approach was chosen):
# 検出方法（debug.log 方式を採用した理由）:
#   WP_DEBUG_DISPLAY is disabled and WP_DEBUG_LOG is used to collect errors into
#   debug.log, instead of scanning the response body's text. Reasons for reading
#   debug.log rather than the response body:
#   WP_DEBUG_DISPLAY を無効にし、WP_DEBUG_LOG で debug.log にエラーを集約する方式を採る。
#   レスポンス本文の文字列走査ではなく debug.log を見るのは、
#     - Enabling WP_DEBUG_DISPLAY tends to make the HTTP 200 check and body comparisons
#       unstable, since warnings can get mixed into the body.
#     - WP_DEBUG_DISPLAY を有効にすると本文中の警告混入で HTTP 200 判定や
#       本文比較が不安定になりやすい
#     - debug.log is the single place WordPress's error handler consistently writes
#       Warning/Notice/Deprecated/Fatal to, unaffected by output buffering on the
#       template side.
#     - debug.log は WordPress のエラーハンドラが Warning/Notice/Deprecated/Fatal を
#       一貫して書き込む先であり、テンプレート側の出力バッファリングの影響を受けない
#   which we judged to be the more reliable way to detect these.
#   ためで、より確実に検出できると判断したため。
#
#   To keep CI from becoming flaky due to noise from core or plugins, only log lines that
#   contain the theme's path (wp-content/themes/x-t9) are considered.
#   コアやプラグイン由来のノイズで CI が不安定にならないよう、
#   ログ行に「テーマのパス（wp-content/themes/x-t9）」を含むものだけを対象にする。
#
# Prerequisites:
# 前提:
#   - `npx wp-env start` has already run and the dist theme (x-t9) is active (as done by
#     the smoke_test job in .github/workflows/release.yml, or the equivalent steps
#     followed locally).
#   - `npx wp-env start` 済みで、dist テーマ（x-t9）が有効化されていること
#     （.github/workflows/release.yml の smoke_test ジョブ、または
#     ローカルで同様の手順を踏んだ状態）
#   - The SMOKE_BASE_URL environment variable can be used to specify wp-env's site URL
#     (defaults to wp-env's default port, http://localhost:8888, if unset. This
#     repository's local convention of using port 9144/9145 diverges from that default,
#     so always set it explicitly, e.g. SMOKE_BASE_URL=http://localhost:9144).
#   - SMOKE_BASE_URL 環境変数で wp-env のサイト URL を指定できる
#     （未指定時は wp-env の既定ポート http://localhost:8888。このリポジトリの
#     ローカル運用ルールでポート 9144/9145 を指定している場合は、このデフォルトと
#     食い違うため必ず SMOKE_BASE_URL=http://localhost:9144 のように明示すること）
#
# Usage (local):
# 使い方（ローカル）:
#   1. Set {"port": 9144, "testsPort": 9145} etc. in .wp-env.override.json, then
#      `npx wp-env start` (follow this repository's local conventions).
#   1. .wp-env.override.json に {"port": 9144, "testsPort": 9145} 等を指定して
#      `npx wp-env start` する（※このリポジトリのローカル運用ルールに従うこと）
#   2. `npx wp-env run cli wp theme activate x-t9`
#   3. `SMOKE_BASE_URL=http://localhost:9144 bin/smoke-check-frontend.sh`
#
# Exit code:
# 終了コード:
#   0: PASS
#   1: FAIL (an HTTP error, a detected theme-originated PHP error/warning, or the log
#      itself could not be checked)
#   1: FAIL（HTTP エラー、テーマ由来の PHP エラー/警告の検出、
#      またはログ自体を確認できなかった場合）
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$REPO_ROOT"

THEME_NAME="x-t9"
BASE_URL="${SMOKE_BASE_URL:-http://localhost:8888}"
# Absolute path inside the wp-env container (the cli container mounts the same
# wp-content volume as the wordpress container).
# wp-env コンテナ内での絶対パス（cli コンテナは wordpress コンテナと
# wp-content を共有するボリュームをマウントしている）。
DEBUG_LOG_PATH="/var/www/html/wp-content/debug.log"

# Pages to check (query-string based, so this does not depend on the permalink
# structure). Uses the default content wp-env creates on startup (Hello world! = post
# ID 1, Sample Page = page ID 2).
# 確認するページ（クエリ文字列ベースで指定し、パーマリンク設定に依存しないようにする）。
# wp-env が起動時に作成する既定コンテンツ（Hello world! = 投稿ID 1, Sample Page = 固定ページID 2）を利用する。
PATHS=(
	"/"            # フロントページ（front-page.html テンプレート）
	"/?p=1"        # 個別投稿（single.html テンプレート）
	"/?page_id=2"  # 固定ページ（page.html テンプレート）
)

# ------------------------------------------------------------------------
# Reset debug.log.
# debug.log をリセットする。
#
# If rm fails (e.g. a permission error) and that goes unnoticed, the previous log
# carries over and its errors get mixed into the next request's results, which is a
# source of false detections. So this exits as FAIL unless it can confirm the success
# sentinel string (RESET_OK) came back.
# rm が失敗した場合（権限エラー等）に気付かず前回ログを持ち越すと、次のリクエストの
# 結果に前回分のエラーが混ざって誤検出の元になるため、成功を示すセンチネル文字列
# （RESET_OK）が返ってきたことを確認できないときは FAIL として終了する。
# ------------------------------------------------------------------------
reset_debug_log() {
	local output
	output="$(npx wp-env run cli bash -c "rm -f '${DEBUG_LOG_PATH}' && echo RESET_OK" 2>&1)" || true

	# Using a regex that tolerates trailing whitespace/CR, instead of grep -qx, is
	# insurance against a future false FAIL if wp-env's TTY detection ever changes and
	# \r etc. get mixed into the output (currently confirmed to run non-TTY, so no \r is
	# mixed in today, but this is a change that keeps paying off long-term).
	# grep -qx ではなく行末の空白・CR を許容する正規表現にしているのは、wp-env の
	# TTY 判定が将来変わって出力に \r 等が混入しても誤って FAIL 扱いにしないための保険
	# （現状は非 TTY 実行のため \r は混入しないことを確認済みだが、恒久的に効く対策として）。
	if ! printf '%s\n' "$output" | grep -Eq '^RESET_OK[[:space:]]*$'; then
		echo "エラー: debug.log をリセットできませんでした（wp-env コンテナへのコマンド実行に失敗した可能性があります）。" >&2
		echo "以下は wp-env run cli の出力です:" >&2
		printf '%s\n' "$output" >&2
		exit 1
	fi
}

# ------------------------------------------------------------------------
# Read the content of debug.log.
# debug.log の内容を取得する。
#
# To avoid a false PASS from mistaking "the confirmation command itself failed" (e.g. the
# container is not running, a permission error) for "the log was simply empty" (a safety
# net silently dying), the result of test is captured explicitly as one of the sentinel
# strings EXISTS / ABSENT, and if it is neither, this treats it as "could not be
# confirmed" and FAILs.
# コンテナ未起動・権限エラー等で確認コマンド自体が失敗したときに「ログが空だった」と
# 誤判定して PASS してしまう（セーフティネットが黙って死ぬ）のを防ぐため、
# test の結果を EXISTS / ABSENT のいずれかのセンチネル文字列として明示的に受け取り、
# どちらでもなければ「確認できなかった」として FAIL する。
# ------------------------------------------------------------------------
read_debug_log() {
	local presence
	presence="$(npx wp-env run cli bash -c "test -f '${DEBUG_LOG_PATH}' && echo EXISTS || echo ABSENT" 2>&1)" || true

	# The sentinel check uses grep -Eq '^...[[:space:]]*$' to tolerate trailing
	# whitespace/CR (LOW-C: so this does not turn into a false FAIL even if wp-env's
	# TTY detection changes in the future).
	# センチネル判定は grep -Eq '^...[[:space:]]*$' で行末の空白・CR を許容する
	# （LOW-C: wp-env の TTY 判定が将来変わっても偽 FAIL にならないようにするため）。
	if printf '%s\n' "$presence" | grep -Eq '^EXISTS[[:space:]]*$'; then
		npx wp-env run cli bash -c "cat '${DEBUG_LOG_PATH}'" 2>&1
		return 0
	fi

	if printf '%s\n' "$presence" | grep -Eq '^ABSENT[[:space:]]*$'; then
		# debug.log itself was never created, meaning there were zero errors/warnings.
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

# Even when the HTTP checks failed, always check debug.log and keep it in the log for
# troubleshooting (exiting before checking debug.log would leave a 500's cause entirely
# out of the CI log).
#
# The call to read_debug_log() is not written as a command substitution like
# `log_content="$(read_debug_log)"`. A command substitution runs in a subshell, so the
# exit 1 called inside the function on error would only terminate that subshell instead
# of propagating to the parent process (this script) that is supposed to FAIL. Writing to
# a file via a plain redirect (which does not create a subshell) lets exit propagate
# correctly instead.
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

# Only consider lines that contain the theme's (x-t9) path.
# To avoid CI becoming flaky from picking up noise such as Deprecated notices
# originating from core or plugins.
# テーマ（x-t9）のパスを含む行のみを対象にする。
# コアやプラグイン由来の Deprecated 等のノイズを拾って CI が不安定にならないようにするため。
theme_errors="$(grep -E "PHP (Warning|Notice|Deprecated|Fatal error|Parse error)" "$log_file" | grep -F "themes/${THEME_NAME}" || true)"

if [ -n "$theme_errors" ]; then
	echo "FAIL: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告が検出されました:" >&2
	echo "$theme_errors" >&2
	exit 1
fi

if [ "$http_failed" -ne 0 ]; then
	# For an error whose message does not contain the theme's path (a Fatal error
	# originating from core/a plugin, a DB connection error, etc.) that results in a 500,
	# theme_errors ends up empty. To avoid a situation where the CI log carries no clue
	# at all about the cause, always print the content of debug.log here (unfiltered,
	# last 100 lines) before FAILing.
	# テーマのパスを含まないエラー（コア/プラグイン由来の Fatal error、DB 接続エラー等）で
	# 500 になっているケースでは theme_errors に何も残らない。原因調査の手がかりが
	# CI ログに一切残らない事態を避けるため、debug.log の中身（フィルタ前・末尾 100 行）を
	# ここで必ず出力してから FAIL する。
	echo "情報: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告は検出されませんでしたが、上記の HTTP エラーにより FAIL とします。" >&2
	echo "参考: debug.log の内容（末尾 100 行）:" >&2
	tail -n 100 "$log_file" >&2
	exit 1
fi

echo "OK: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告は検出されませんでした。"
exit 0
