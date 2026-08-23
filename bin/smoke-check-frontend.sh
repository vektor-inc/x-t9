#!/usr/bin/env bash
#
# dist テーマを実際にフロント表示し、HTTP 200 が返ることと
# テーマ（x-t9）由来の PHP エラー・警告・注意・非推奨が出ていないことを確認する。
#
# 背景（#479）:
#   PR #478 のバグは「テーマを有効化しただけ」では気付けず、実際にページを
#   表示したときにだけ file_get_contents() の PHP Warning が出るものだった。
#   これを検出するため、wp theme activate だけで終わらせず、実際に主要ページを
#   リクエストして確認する。
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
#     （未指定時は wp-env の既定ポート http://localhost:8888）
#
# 使い方（ローカル）:
#   1. .wp-env.override.json に {"port": 9144, "testsPort": 9145} 等を指定して
#      `npx wp-env start` する（※このリポジトリのローカル運用ルールに従うこと）
#   2. `npx wp-env run cli wp theme activate x-t9`
#   3. `SMOKE_BASE_URL=http://localhost:9144 bin/smoke-check-frontend.sh`
#
# 終了コード:
#   0: PASS
#   1: FAIL（HTTP エラー、またはテーマ由来の PHP エラー/警告を検出）
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$REPO_ROOT"

THEME_NAME="x-t9"
BASE_URL="${SMOKE_BASE_URL:-http://localhost:8888}"

# 確認するページ（クエリ文字列ベースで指定し、パーマリンク設定に依存しないようにする）。
# wp-env が起動時に作成する既定コンテンツ（Hello world! = 投稿ID 1, Sample Page = 固定ページID 2）を利用する。
PATHS=(
	"/"            # フロントページ（front-page.html テンプレート）
	"/?p=1"        # 個別投稿（single.html テンプレート）
	"/?page_id=2"  # 固定ページ（page.html テンプレート）
)

echo "情報: debug.log をリセットします。"
npx wp-env run cli bash -c "rm -f wp-content/debug.log" >/dev/null

failed=0
for path in "${PATHS[@]}"; do
	url="${BASE_URL}${path}"
	body_file="$(mktemp)"
	code="$(curl -sS -o "$body_file" -w '%{http_code}' "$url" || echo "000")"
	rm -f "$body_file"

	if [ "$code" != "200" ]; then
		echo "FAIL: ${url} が HTTP ${code} を返しました（200 を期待）。" >&2
		failed=1
	else
		echo "OK: ${url} -> HTTP ${code}"
	fi
done

if [ "$failed" -ne 0 ]; then
	exit 1
fi

echo "情報: debug.log を確認します。"
log_file="$(mktemp)"
# wp-env run の装飾出力（ℹ Starting.../✔ Ran...）が混ざるが、
# 後続の grep パターン（"PHP (Warning|...)" かつ "themes/x-t9"）には一致しないため無害。
if npx wp-env run cli bash -c "test -f wp-content/debug.log" >/dev/null 2>&1; then
	npx wp-env run cli bash -c "cat wp-content/debug.log" > "$log_file" 2>&1 || true
else
	: > "$log_file"
fi

# テーマ（x-t9）のパスを含む行のみを対象にする。
# コアやプラグイン由来の Deprecated 等のノイズを拾って CI が不安定にならないようにするため。
theme_errors="$(grep -E "PHP (Warning|Notice|Deprecated|Fatal error|Parse error)" "$log_file" | grep -F "themes/${THEME_NAME}" || true)"
rm -f "$log_file"

if [ -n "$theme_errors" ]; then
	echo "FAIL: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告が検出されました:" >&2
	echo "$theme_errors" >&2
	exit 1
fi

echo "OK: dist テーマ（${THEME_NAME}）由来の PHP エラー/警告は検出されませんでした。"
exit 0
