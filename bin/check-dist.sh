#!/usr/bin/env bash
#
# 配布パッケージ（dist/x-t9 ディレクトリおよび dist/x-t9.zip）の網羅性を検証する。
#
# 背景（#479）:
#   PR #478 では、配布用 zip を組み立てる gulp の dist タスク（gulpfile.js）に
#   plugin-support ディレクトリの指定が無く、plugin-support/snow-monkey-forms/js/
#   smf-fixed-header-offset.js が配布 zip に含まれていなかった。当時のスモークテストは
#   dist/x-t9/style.css と dist/x-t9/functions.php の存在しか確認しておらず、
#   この欠落を検出できなかった。
#
#   防ぎたいのは個別のファイル名ではなく「ソースツリーには存在するのに配布パッケージに
#   含まれていないファイルがある」というクラスの不具合。そのため、期待するファイル名を
#   ハードコードして test -f で確認する方式は採らない（新しく追加されたファイルの漏れを
#   検出できないため）。
#
# 方式:
#   git で追跡されている実ファイルの一覧（git ls-files）を起点にし、配布対象外として
#   明示的に除外したもの（is_excluded 関数）を引いた残りが、すべて dist/x-t9/ 配下と
#   dist/x-t9.zip の中に存在することを確認する。
#
# 使い方:
#   npm run dist（build → gulp dist → zip 化）を実行して dist/x-t9 と dist/x-t9.zip を
#   作成した後、以下のいずれかを実行する。
#     bin/check-dist.sh
#     npm run check-dist
#
# 終了コード:
#   0: PASS（ソースの全ファイルが配布パッケージに含まれている）
#   1: FAIL（配布パッケージに欠落しているファイルがある。標準エラーにファイル名を列挙する）
#
set -euo pipefail

# どこから実行してもリポジトリルートで動くようにする。
REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$REPO_ROOT"

THEME_NAME="x-t9"
DIST_DIR="dist/${THEME_NAME}"
DIST_ZIP="dist/${THEME_NAME}.zip"

if [ ! -d "$DIST_DIR" ]; then
	echo "エラー: ${DIST_DIR} が存在しません。先に \`npm run dist\` を実行してください。" >&2
	exit 1
fi

# ------------------------------------------------------------------------
# 配布対象外として明示的に除外するパス（このファイルに 1 箇所だけ定義する）。
#
# ここに列挙していないファイルは「配布パッケージに含まれるべきファイル」とみなされ、
# dist に無ければ FAIL する。新しくファイルをリポジトリに追加したときは、
#   - 配布に必要      → 何もしない（自動的にチェック対象になる）
#   - 配布に不要      → 理由をコメントで添えてここに追加する
# のどちらかを人が判断すること。
#
# パターンは `git ls-files` が返すリポジトリルート相対パスに対して
# シェルの case 文（glob）でマッチさせる。
# ------------------------------------------------------------------------
is_excluded() {
	local path="$1"
	case "$path" in
		# --- gulpfile.js の dist タスクが明示的に除外しているもの ---
		.wp-env.json | .wp-env.override.json) return 0 ;;
		package.json | package-lock.json) return 0 ;;
		composer.json | composer.lock) return 0 ;;
		tests/*) return 0 ;;      # PHPUnit テスト（実行時のテーマ動作には不要）
		dist/*) return 0 ;;       # ビルド成果物自身
		docs/*) return 0 ;;       # 開発者向けドキュメント

		# --- ビルド・開発ツールの設定ファイル（実行時のテーマ動作には不要） ---
		gulpfile.js) return 0 ;;
		webpack.js) return 0 ;;
		phpunit.xml.dist) return 0 ;;
		.gitignore) return 0 ;;
		.coderabbit.yaml) return 0 ;;
		readme.md) return 0 ;; # GitHub 用の説明ファイル（wordpress.org 用は readme.txt で別途配布対象）

		# --- GitHub / CI 関連（配布不要） ---
		.github/*) return 0 ;;

		# --- このスクリプト自身（配布 zip に含める必要が無いため除外） ---
		bin/*) return 0 ;;

		*) return 1 ;;
	esac
}

# ------------------------------------------------------------------------
# (1) dist ディレクトリの網羅性チェック
# ------------------------------------------------------------------------
missing_dir=()
while IFS= read -r path; do
	is_excluded "$path" && continue
	[ -e "${DIST_DIR}/${path}" ] || missing_dir+=("$path")
done < <(git ls-files)

if [ "${#missing_dir[@]}" -gt 0 ]; then
	echo "FAIL: 以下のファイルはソースには存在しますが ${DIST_DIR}/ に含まれていません:" >&2
	for f in "${missing_dir[@]}"; do
		echo "  - $f" >&2
	done
	echo >&2
	echo "対処: gulpfile.js の dist タスクの対象パターンに含める（配布に必要な場合）か、" >&2
	echo "      bin/check-dist.sh の is_excluded() へ理由付きで追加する（配布に不要な場合）。" >&2
	exit 1
fi

echo "OK: ソースの追跡ファイル（除外分を除く）はすべて ${DIST_DIR}/ に存在します。"

# ------------------------------------------------------------------------
# (2) zip の網羅性チェック（dist ディレクトリは正しくても、zip 化の過程で
#     ファイルが落ちる可能性を排除するための追加確認）
# ------------------------------------------------------------------------
if [ ! -f "$DIST_ZIP" ]; then
	echo "情報: ${DIST_ZIP} が見つからないため zip の中身チェックはスキップしました。" >&2
	exit 0
fi

zip_list_file="$(mktemp)"
trap 'rm -f "$zip_list_file"' EXIT

# unzip -Z1: ファイル名のみを 1 行 1 件で列挙する（zipinfo 互換モード）。
# ディレクトリエントリ（末尾が /）や zip 内トップディレクトリ自体の行は比較対象にしないため除去する。
unzip -Z1 "$DIST_ZIP" \
	| sed -e "s#^${THEME_NAME}/##" \
	| sed -e '/\/$/d' -e '/^$/d' \
	> "$zip_list_file"

missing_zip=()
while IFS= read -r path; do
	is_excluded "$path" && continue
	grep -Fxq "$path" "$zip_list_file" || missing_zip+=("$path")
done < <(git ls-files)

if [ "${#missing_zip[@]}" -gt 0 ]; then
	echo "FAIL: 以下のファイルはソースには存在しますが ${DIST_ZIP} に含まれていません:" >&2
	for f in "${missing_zip[@]}"; do
		echo "  - $f" >&2
	done
	exit 1
fi

echo "OK: ${DIST_ZIP} にもソースの追跡ファイル（除外分を除く）がすべて含まれています。"
exit 0
