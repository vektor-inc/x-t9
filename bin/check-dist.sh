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
#   防ぎたいのは個別のファイル名ではなく「ソースには存在するのに配布パッケージに
#   含まれていないファイルがある」というクラスの不具合。そのため、期待するファイル名を
#   ハードコードして test -f で確認する方式は採らない（新しく追加されたファイルの漏れを
#   検出できないため）。
#
# 方式:
#   (1) git で追跡されている実ファイルの一覧（git ls-files）を起点にし、配布対象外として
#       明示的に除外したもの（is_excluded 関数）を引いた残りが、すべて dist/x-t9/ 配下と
#       dist/x-t9.zip の中に存在することを確認する。
#   (2) それに加えて、.gitignore 対象（assets/js・assets/css・vendor 配下のビルド成果物）は
#       git ls-files に現れないため、(1) では検出できない。これらのうち配布に必須なものは
#       REQUIRED_BUILD_ARTIFACTS に明示リストとして持ち、個別に検証する。
#       ただし実機検証の結果、gulpfile.js の拡張子ベースの各パターン（'./**/*.php'・
#       './**/*.css' 等）が広く効いているため、このリストの中で「ディレクトリ単位の
#       1 行指定（'./assets/**' 等）が消えたときに実際に dist から落ちる」のは
#       assets/js/*.js の 2 件だけ。詳細は REQUIRED_BUILD_ARTIFACTS 定義部のコメントを参照。
#
# 使い方:
#   npm run dist（build → gulp dist → zip 化）を実行して dist/x-t9 と dist/x-t9.zip を
#   作成した後、以下のいずれかを実行する。
#     bin/check-dist.sh
#     npm run check-dist
#
# 終了コード:
#   0: PASS（ソースの全ファイル + 必須ビルド成果物が配布パッケージに含まれている）
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
# gulpfile.js の dist タスク側の除外パターン（!./tests/** 等）を変更したときは、
# 対応するこの関数も必ず更新すること（二重管理になっているため、片方だけ変更すると
# gulpfile.js と check-dist.sh の判定基準がずれる）。gulpfile.js 側にも同旨のコメントを
# 置いている。
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

		# --- このスクリプト・スモークテストスクリプト自身（配布 zip に含める必要が無いため除外）。
		#     bin/ は開発用スクリプト専用ディレクトリとする。配布物はここに置かないこと。
		#     新しく bin/ 配下にスクリプトを追加した場合は、ここにも完全一致で追加すること
		#     （bin/* のような広いワイルドカードにすると、将来 bin/ に配布が必要なファイルを
		#     置いたときに気付けず黙って除外され続けるため、完全一致で列挙する）。
		bin/check-dist.sh) return 0 ;;
		bin/smoke-check-frontend.sh) return 0 ;;

		*) return 1 ;;
	esac
}

# ------------------------------------------------------------------------
# git 管理外（.gitignore 対象）だが配布に必須なビルド成果物。
# git ls-files では拾えないため個別に検証する。
#
# ファイル名は推測ではなく実機（npm run build:script / npm run build:css /
# composer install）で生成し直して確認したもの。webpack.js の entry/output や
# ビルドコマンドの出力先を変更した場合は、ここも実機で確認のうえ更新すること。
#
# 【実測結果（安藤のレビューで gulp 本体を使い glob を実際に解決して検証）】
# gulpfile.js の dist タスクは拡張子ベースのパターン（'./**/*.php'・'./**/*.css' 等）と
# ディレクトリ単位のパターン（'./assets/**'・'./vendor/**' 等）を併用しており、
# 同じファイルが複数のパターンに重複してマッチすることがある。そのため
# 「ディレクトリ単位のパターンが 1 行消えたら実際に dist から落ちるか」は
# ファイルの拡張子によって結果が異なる。以下の表のとおり、
# 「'./assets/**' の 1 行依存を実際に守れている」のは assets/js/*.js の 2 件だけ。
#
#   ファイル                        | 全パターン | './assets/**'削除 | './vendor/**'削除
#   assets/js/main.js               | 含まれる   | 含まれない(検出可)| 含まれる
#   assets/js/editor-layout.js      | 含まれる   | 含まれない(検出可)| 含まれる
#   assets/css/style.css            | 含まれる   | 含まれる(検出不可)| 含まれる
#   assets/css/editor.css           | 含まれる   | 含まれる(検出不可)| 含まれる
#   assets/css/editor-wp65.css      | 含まれる   | 含まれる(検出不可)| 含まれる
#   vendor/autoload.php             | 含まれる   | 含まれる          | 含まれる(検出不可)
#
# それでも assets/css/*.css と vendor/autoload.php をこのリストから外さないのは、
# 「'./assets/**' 1 行への依存」の検出とは別の目的があるため:
#   - assets/css/*.css: ビルド（npm run build:css）自体が走っていない、または
#     出力先が変わった場合を検出する。'./**/*.css' に拾われるので './assets/**' が
#     消えても検出できないが、CSS ビルドの失敗・未実行そのものは検出できる。
#   - vendor/autoload.php: composer install 自体が失敗・未実行の場合を検出する。
#     './**/*.php' に拾われるので './vendor/**' が消えても検出できない（実際に
#     './vendor/**' 削除で落ちるのは vendor 配下の LICENSE・README・.mo/.po 等の
#     非 PHP/JSON ファイルのみで、オートロードに必要なファイルは落ちない）。
#     なお CI（release.yml の smoke_test ジョブ）は `composer install --no-dev` を
#     実行するため、dist/x-t9/vendor には実行時に必要な依存（vektor-inc/tgm-plugin-activation
#     等）のみが入り、phpunit 等の開発用依存は含まれない前提。vendor/autoload.php は
#     --no-dev でも生成されるファイルなのでこの検証は変わらず有効。
# ------------------------------------------------------------------------
REQUIRED_BUILD_ARTIFACTS=(
	# webpack.js の entry（main / editor-layout）→ output（assets/js/[name].js）。
	# npm run build:script（= npx webpack --config webpack.js）で生成される。
	# .js 拡張子は gulpfile.js のどの拡張子パターンにも含まれておらず、
	# './assets/**' 1 行だけでコピーされる。この行が消えるとテーマの JS が
	# dist からまるごと落ちる（#478 と同じ「1 行依存」の構図を実際に守っているのはこの 2 件のみ）。
	"assets/js/main.js"
	"assets/js/editor-layout.js"

	# npm run build:css（sass → postcss:all）の出力。
	# 注: これらは gulpfile.js の './**/*.css' にも拾われるため './assets/**' の
	# 削除では落ちない。ここに置く目的は「ビルドが走っていない／出力先が変わった」
	# ことの検出であり、'./assets/**' の1行依存を守っているのは上の .js 2件のみ。
	"assets/css/style.css"
	"assets/css/editor.css"
	"assets/css/editor-wp65.css"

	# composer install --no-dev の出力。'./**/*.php' にも拾われるため './vendor/**' の
	# 削除では落ちない（削除で実際に落ちるのは vendor 配下の LICENSE・README 等、
	# .php/.json 以外の非機能ファイルのみ）。ここに置く目的は composer install
	# 自体の失敗・未実行の検出。
	"vendor/autoload.php"
)

# ------------------------------------------------------------------------
# (1) dist ディレクトリの網羅性チェック
# ------------------------------------------------------------------------
missing_dir=()
missing_required_dir=()

# git ls-files はデフォルトで非 ASCII パスを "\346\227\245..." のようにエスケープして
# 出力するため、-c core.quotePath=false でエスケープを無効化する。さらに改行を含む
# ファイル名にも対応できるよう NUL 区切り（-z）で受け取る。
while IFS= read -r -d '' path; do
	is_excluded "$path" && continue
	[ -f "${DIST_DIR}/${path}" ] || missing_dir+=("$path")
done < <(git -c core.quotePath=false ls-files -z)

# REQUIRED_BUILD_ARTIFACTS が空でも `set -u` 下で "${arr[@]}" が unbound variable に
# ならないよう、要素数を確認してからループする（bash 3.2 でも安全）。
# このリストを空にしないこと（空にする場合は上のコメントも見直すこと）。
if [ "${#REQUIRED_BUILD_ARTIFACTS[@]}" -gt 0 ]; then
	for path in "${REQUIRED_BUILD_ARTIFACTS[@]}"; do
		[ -f "${DIST_DIR}/${path}" ] || missing_required_dir+=("$path")
	done
fi

if [ "${#missing_dir[@]}" -gt 0 ] || [ "${#missing_required_dir[@]}" -gt 0 ]; then
	echo "FAIL: 以下のファイルはソースには存在しますが ${DIST_DIR}/ に含まれていません:" >&2
	for f in "${missing_dir[@]}"; do
		echo "  - $f" >&2
	done
	for f in "${missing_required_dir[@]}"; do
		echo "  - $f (git 管理外の必須ビルド成果物)" >&2
	done
	echo >&2
	echo "対処: gulpfile.js の dist タスクの対象パターンに含める（配布に必要な場合）か、" >&2
	echo "      bin/check-dist.sh の is_excluded() へ理由付きで追加する（配布に不要な場合）。" >&2
	exit 1
fi

echo "OK: ソースの追跡ファイル + 必須ビルド成果物（除外分を除く）はすべて ${DIST_DIR}/ に存在します。"

# ------------------------------------------------------------------------
# (2) zip の網羅性チェック（dist ディレクトリは正しくても、zip 化の過程で
#     ファイルが落ちる可能性を排除するための追加確認）
# ------------------------------------------------------------------------
if [ ! -f "$DIST_ZIP" ]; then
	echo "情報: ${DIST_ZIP} が見つからないため zip の中身チェックはスキップしました。" >&2
	exit 0
fi

# zip の中身チェックに使う unzip が無いと以降の検証ができないため、ここで確認する。
# DIST_ZIP の存在チェックより後ろに置くのは、npm run copy だけを実行して zip 化前に
# check-dist を回すような場面（zip 自体が無い＝上で exit 0 スキップ済み）で、
# 使わない unzip の有無のために不必要に FAIL させないため。
if ! command -v unzip >/dev/null 2>&1; then
	echo "エラー: unzip コマンドが見つかりません。${DIST_ZIP} の中身を検証できないため終了します。" >&2
	echo "        （macOS/Ubuntu には標準で入っています。CI 環境の構成を確認してください）" >&2
	exit 1
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
missing_required_zip=()
while IFS= read -r -d '' path; do
	is_excluded "$path" && continue
	grep -Fxq -- "$path" "$zip_list_file" || missing_zip+=("$path")
done < <(git -c core.quotePath=false ls-files -z)

if [ "${#REQUIRED_BUILD_ARTIFACTS[@]}" -gt 0 ]; then
	for path in "${REQUIRED_BUILD_ARTIFACTS[@]}"; do
		grep -Fxq -- "$path" "$zip_list_file" || missing_required_zip+=("$path")
	done
fi

if [ "${#missing_zip[@]}" -gt 0 ] || [ "${#missing_required_zip[@]}" -gt 0 ]; then
	echo "FAIL: 以下のファイルはソースには存在しますが ${DIST_ZIP} に含まれていません:" >&2
	for f in "${missing_zip[@]}"; do
		echo "  - $f" >&2
	done
	for f in "${missing_required_zip[@]}"; do
		echo "  - $f (git 管理外の必須ビルド成果物)" >&2
	done
	exit 1
fi

echo "OK: ${DIST_ZIP} にもソースの追跡ファイル + 必須ビルド成果物（除外分を除く）がすべて含まれています。"
exit 0
