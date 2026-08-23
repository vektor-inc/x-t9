#!/usr/bin/env bash
#
# Verify that the distribution package (dist/x-t9 directory and dist/x-t9.zip) is complete.
# 配布パッケージ（dist/x-t9 ディレクトリおよび dist/x-t9.zip）の網羅性を検証する。
#
# Background (#479):
# 背景（#479）:
#   PR #478 fixed a bug where the gulp dist task (gulpfile.js) that assembles the distribution
#   zip had no rule for the plugin-support directory, so plugin-support/snow-monkey-forms/js/
#   smf-fixed-header-offset.js was missing from the distributed zip. The smoke test at the time
#   only checked that dist/x-t9/style.css and dist/x-t9/functions.php existed, so it could not
#   catch this omission.
#   PR #478 では、配布用 zip を組み立てる gulp の dist タスク（gulpfile.js）に
#   plugin-support ディレクトリの指定が無く、plugin-support/snow-monkey-forms/js/
#   smf-fixed-header-offset.js が配布 zip に含まれていなかった。当時のスモークテストは
#   dist/x-t9/style.css と dist/x-t9/functions.php の存在しか確認しておらず、
#   この欠落を検出できなかった。
#
#   What we want to prevent is not any single filename, but the whole class of bugs where
#   "a file exists in the source tree but is missing from the distribution package." That is
#   why this script does not hardcode a list of expected filenames and check them with test -f
#   (that approach can never catch a newly added file that was simply left off the list).
#   防ぎたいのは個別のファイル名ではなく「ソースには存在するのに配布パッケージに
#   含まれていないファイルがある」というクラスの不具合。そのため、期待するファイル名を
#   ハードコードして test -f で確認する方式は採らない（新しく追加されたファイルの漏れを
#   検出できないため）。
#
# Approach:
# 方式:
#   (1) Start from the list of files tracked by git (git ls-files), subtract the files
#       explicitly excluded from distribution (the is_excluded function), and confirm that
#       everything left over exists both under dist/x-t9/ and inside dist/x-t9.zip.
#   (1) git で追跡されている実ファイルの一覧（git ls-files）を起点にし、配布対象外として
#       明示的に除外したもの（is_excluded 関数）を引いた残りが、すべて dist/x-t9/ 配下と
#       dist/x-t9.zip の中に存在することを確認する。
#   (2) In addition, build artifacts under .gitignore (assets/js, assets/css, vendor) never
#       show up in git ls-files, so (1) alone cannot catch them missing. The ones required for
#       distribution are kept in an explicit list, REQUIRED_BUILD_ARTIFACTS, and checked
#       individually. However, hands-on verification showed that gulpfile.js's extension-based
#       patterns (e.g. './**/*.php', './**/*.css') already cover most of this list broadly, so
#       within this list, only assets/js/*.js (2 files) actually depends on a single
#       directory-level pattern (e.g. './assets/**') and would truly go missing if that one
#       line were removed. See the comment on the REQUIRED_BUILD_ARTIFACTS definition for
#       details.
#   (2) それに加えて、.gitignore 対象（assets/js・assets/css・vendor 配下のビルド成果物）は
#       git ls-files に現れないため、(1) では検出できない。これらのうち配布に必須なものは
#       REQUIRED_BUILD_ARTIFACTS に明示リストとして持ち、個別に検証する。
#       ただし実機検証の結果、gulpfile.js の拡張子ベースの各パターン（'./**/*.php'・
#       './**/*.css' 等）が広く効いているため、このリストの中で「ディレクトリ単位の
#       1 行指定（'./assets/**' 等）が消えたときに実際に dist から落ちる」のは
#       assets/js/*.js の 2 件だけ。詳細は REQUIRED_BUILD_ARTIFACTS 定義部のコメントを参照。
#
# Usage:
# 使い方:
#   After running npm run dist (clean dist/ -> build -> gulp dist -> zip) to produce
#   dist/x-t9 and dist/x-t9.zip, run either of the following. Since npm run dist always
#   removes dist/ before rebuilding (npx rimraf dist), it never leaves stale files from a
#   previous build behind for this check to mistake as present, even when dist/ is not
#   deleted by hand between runs.
#   npm run dist（dist/ を削除 → build → gulp dist → zip 化）を実行して dist/x-t9 と
#   dist/x-t9.zip を作成した後、以下のいずれかを実行する。npm run dist は毎回ビルド前に
#   dist/ を削除する（npx rimraf dist）ため、dist/ を手動で消さずに連続実行しても、
#   前回ビルドの古いファイルが残っていて「ある」と誤判定することは無い。
#     bin/check-dist.sh
#     npm run check-dist
#
# Exit code:
# 終了コード:
#   0: PASS (every source file + required build artifact is present in the distribution package)
#   0: PASS（ソースの全ファイル + 必須ビルド成果物が配布パッケージに含まれている）
#   1: FAIL (something is missing from the distribution package; filenames are listed on stderr)
#   1: FAIL（配布パッケージに欠落しているファイルがある。標準エラーにファイル名を列挙する）
#
set -euo pipefail

# Move to the repository root so this works no matter where it is invoked from.
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
# Paths explicitly excluded from distribution (defined in exactly one place, this file).
# 配布対象外として明示的に除外するパス（このファイルに 1 箇所だけ定義する）。
#
# A file that is not listed here is treated as "should be included in the distribution
# package" and causes a FAIL if it is missing from dist. When a new file is added to the
# repository, a human must decide:
#   - required for distribution -> do nothing (it is checked automatically)
#   - not required for distribution -> add it here with a reason in a comment
# ここに列挙していないファイルは「配布パッケージに含まれるべきファイル」とみなされ、
# dist に無ければ FAIL する。新しくファイルをリポジトリに追加したときは、
#   - 配布に必要      → 何もしない（自動的にチェック対象になる）
#   - 配布に不要      → 理由をコメントで添えてここに追加する
# のどちらかを人が判断すること。
#
# When the exclusion patterns on the gulpfile.js dist task side (!./tests/** etc.) change,
# this function must be updated to match (the two are duplicated on purpose for readability,
# so changing only one side makes gulpfile.js and check-dist.sh disagree). gulpfile.js carries
# the same cross-reference comment.
# gulpfile.js の dist タスク側の除外パターン（!./tests/** 等）を変更したときは、
# 対応するこの関数も必ず更新すること（二重管理になっているため、片方だけ変更すると
# gulpfile.js と check-dist.sh の判定基準がずれる）。gulpfile.js 側にも同旨のコメントを
# 置いている。
#
# Patterns are matched against the repository-root-relative paths returned by
# `git ls-files`, using a shell case statement (glob).
# パターンは `git ls-files` が返すリポジトリルート相対パスに対して
# シェルの case 文（glob）でマッチさせる。
# ------------------------------------------------------------------------
is_excluded() {
	local path="$1"
	case "$path" in
		# --- Explicitly excluded by the gulpfile.js dist task ---
		# --- gulpfile.js の dist タスクが明示的に除外しているもの ---
		.wp-env.json | .wp-env.override.json) return 0 ;;
		package.json | package-lock.json) return 0 ;;
		composer.json | composer.lock) return 0 ;;
		# PHPUnit tests (not needed for the theme to run).
		tests/*) return 0 ;;      # PHPUnit テスト（実行時のテーマ動作には不要）
		# The build output itself.
		dist/*) return 0 ;;       # ビルド成果物自身
		# Developer-facing documentation.
		docs/*) return 0 ;;       # 開発者向けドキュメント

		# --- Build/dev tooling configuration (not needed for the theme to run) ---
		# --- ビルド・開発ツールの設定ファイル（実行時のテーマ動作には不要） ---
		gulpfile.js) return 0 ;;
		webpack.js) return 0 ;;
		phpunit.xml.dist) return 0 ;;
		.gitignore) return 0 ;;
		.coderabbit.yaml) return 0 ;;
		# GitHub-facing description file (wordpress.org uses readme.txt, which is
		# distributed separately).
		readme.md) return 0 ;; # GitHub 用の説明ファイル（wordpress.org 用は readme.txt で別途配布対象）

		# --- GitHub / CI related (not for distribution) ---
		# --- GitHub / CI 関連（配布不要） ---
		.github/*) return 0 ;;

		# --- This script and the frontend smoke-test script themselves (no need to put
		#     them in the distribution zip). bin/ is a dedicated directory for dev scripts
		#     only; do not put distributable files there. When adding a new script under
		#     bin/, list it here with an exact match too (a broad wildcard like bin/* would
		#     silently keep excluding a future file that does need to be distributed, so
		#     list each script exactly).
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
# Build artifacts that are outside git's control (.gitignore'd) but required for
# distribution. git ls-files cannot see them, so they are verified individually.
# git 管理外（.gitignore 対象）だが配布に必須なビルド成果物。
# git ls-files では拾えないため個別に検証する。
#
# The filenames below were not guessed; they were confirmed hands-on by regenerating
# them (npm run build:script / npm run build:css / composer install). If webpack.js's
# entry/output or a build command's output location changes, update this list after
# re-verifying hands-on.
# ファイル名は推測ではなく実機（npm run build:script / npm run build:css /
# composer install）で生成し直して確認したもの。webpack.js の entry/output や
# ビルドコマンドの出力先を変更した場合は、ここも実機で確認のうえ更新すること。
#
# [Measured results (verified in code review by resolving gulp's globs with gulp itself)]
# 【実測結果（安藤のレビューで gulp 本体を使い glob を実際に解決して検証）】
# The gulpfile.js dist task combines extension-based patterns (e.g. './**/*.php',
# './**/*.css') with directory-level patterns (e.g. './assets/**', './vendor/**'), and the
# same file can match more than one pattern at once. So "would this file actually
# disappear from dist if a single directory-level pattern line were removed" depends on
# the file's extension. As the table below shows, the only files that actually depend on
# the single './assets/**' line are the two assets/js/*.js files.
# gulpfile.js の dist タスクは拡張子ベースのパターン（'./**/*.php'・'./**/*.css' 等）と
# ディレクトリ単位のパターン（'./assets/**'・'./vendor/**' 等）を併用しており、
# 同じファイルが複数のパターンに重複してマッチすることがある。そのため
# 「ディレクトリ単位のパターンが 1 行消えたら実際に dist から落ちるか」は
# ファイルの拡張子によって結果が異なる。以下の表のとおり、
# 「'./assets/**' の 1 行依存を実際に守れている」のは assets/js/*.js の 2 件だけ。
#
#   File                        | all patterns | './assets/**' removed        | './vendor/**' removed
#   assets/js/main.js           | included     | NOT included (detectable)    | included
#   assets/js/editor-layout.js  | included     | NOT included (detectable)    | included
#   assets/css/style.css        | included     | included (NOT detectable)    | included
#   assets/css/editor.css       | included     | included (NOT detectable)    | included
#   assets/css/editor-wp65.css  | included     | included (NOT detectable)    | included
#   vendor/autoload.php         | included     | included                     | included (NOT detectable)
#
#   ファイル                        | 全パターン | './assets/**'削除 | './vendor/**'削除
#   assets/js/main.js               | 含まれる   | 含まれない(検出可)| 含まれる
#   assets/js/editor-layout.js      | 含まれる   | 含まれない(検出可)| 含まれる
#   assets/css/style.css            | 含まれる   | 含まれる(検出不可)| 含まれる
#   assets/css/editor.css           | 含まれる   | 含まれる(検出不可)| 含まれる
#   assets/css/editor-wp65.css      | 含まれる   | 含まれる(検出不可)| 含まれる
#   vendor/autoload.php             | 含まれる   | 含まれる          | 含まれる(検出不可)
#
# We still keep assets/css/*.css and vendor/autoload.php in this list even though they
# don't actually depend on the single './assets/**' line, because they serve a different
# purpose here:
#   - assets/css/*.css: detects that the CSS build (npm run build:css) itself did not run,
#     or that its output location changed. Because these files are also picked up by
#     './**/*.css', removing './assets/**' alone will not be caught, but a failed/skipped
#     CSS build itself will be.
#   - vendor/autoload.php: detects that composer install itself failed or never ran.
#     Because it is also picked up by './**/*.php', removing './vendor/**' alone will not
#     be caught (removing './vendor/**' actually only drops non-PHP/JSON files under
#     vendor, such as LICENSE/README/.mo/.po; nothing needed for autoloading disappears).
#     Note that CI (the smoke_test job in release.yml) runs `composer install --no-dev`,
#     so dist/x-t9/vendor only ends up containing the runtime dependency
#     (vektor-inc/tgm-plugin-activation etc.), not dev-only dependencies such as phpunit.
#     vendor/autoload.php is generated either way, so this check remains valid with or
#     without --no-dev.
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
	# webpack.js entries (main / editor-layout) -> output (assets/js/[name].js), produced
	# by npm run build:script (= npx webpack --config webpack.js). The .js extension is not
	# covered by any of gulpfile.js's extension-based patterns, so these are copied only by
	# the single './assets/**' line. If that line is removed, the theme's JS disappears from
	# dist entirely (the "single-line dependency" that mirrors #478 is only truly guarded
	# by these 2 files).
	# webpack.js の entry（main / editor-layout）→ output（assets/js/[name].js）。
	# npm run build:script（= npx webpack --config webpack.js）で生成される。
	# .js 拡張子は gulpfile.js のどの拡張子パターンにも含まれておらず、
	# './assets/**' 1 行だけでコピーされる。この行が消えるとテーマの JS が
	# dist からまるごと落ちる（#478 と同じ「1 行依存」の構図を実際に守っているのはこの 2 件のみ）。
	"assets/js/main.js"
	"assets/js/editor-layout.js"

	# Output of npm run build:css (sass -> postcss:all).
	# Note: these are also picked up by gulpfile.js's './**/*.css', so removing
	# './assets/**' does not make them disappear. The point of listing them here is to
	# detect "the build did not run / the output location changed"; only the two .js files
	# above actually depend on the single './assets/**' line.
	# npm run build:css（sass → postcss:all）の出力。
	# 注: これらは gulpfile.js の './**/*.css' にも拾われるため './assets/**' の
	# 削除では落ちない。ここに置く目的は「ビルドが走っていない／出力先が変わった」
	# ことの検出であり、'./assets/**' の1行依存を守っているのは上の .js 2件のみ。
	"assets/css/style.css"
	"assets/css/editor.css"
	"assets/css/editor-wp65.css"

	# Output of composer install --no-dev. Also picked up by './**/*.php', so removing
	# './vendor/**' does not make it disappear (removing './vendor/**' only drops
	# non-functional files under vendor such as LICENSE/README, not .php/.json). The point
	# of listing it here is to detect that composer install itself failed or never ran.
	# composer install --no-dev の出力。'./**/*.php' にも拾われるため './vendor/**' の
	# 削除では落ちない（削除で実際に落ちるのは vendor 配下の LICENSE・README 等、
	# .php/.json 以外の非機能ファイルのみ）。ここに置く目的は composer install
	# 自体の失敗・未実行の検出。
	"vendor/autoload.php"
)

# ------------------------------------------------------------------------
# (1) Check that the dist directory is complete.
# (1) dist ディレクトリの網羅性チェック
# ------------------------------------------------------------------------
missing_dir=()
missing_required_dir=()

# git ls-files escapes non-ASCII paths like "\346\227\245..." by default, so
# -c core.quotePath=false disables that. It is read NUL-delimited (-z) as well, to also
# handle filenames containing newlines.
# git ls-files はデフォルトで非 ASCII パスを "\346\227\245..." のようにエスケープして
# 出力するため、-c core.quotePath=false でエスケープを無効化する。さらに改行を含む
# ファイル名にも対応できるよう NUL 区切り（-z）で受け取る。
while IFS= read -r -d '' path; do
	is_excluded "$path" && continue
	[ -f "${DIST_DIR}/${path}" ] || missing_dir+=("$path")
done < <(git -c core.quotePath=false ls-files -z)

# Check the element count before looping so that "${arr[@]}" on an empty
# REQUIRED_BUILD_ARTIFACTS does not become an unbound variable under `set -u` (this is
# also safe on bash 3.2). Do not let this list become empty (and revisit the comments
# above if you do).
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
	# missing_dir and missing_required_dir may each be non-empty independently, so check
	# each one's element count before expanding it (this guards against "${arr[@]}" on an
	# empty array becoming an unbound variable under bash 3.2's `set -u`; the LOW-D guard
	# is needed here in the display loop too, not just in the collection loop above).
	# missing_dir / missing_required_dir はどちらか一方だけが非空のケースがあるため、
	# それぞれ要素数を確認してから展開する（bash 3.2 の `set -u` 下で空配列の
	# "${arr[@]}" が unbound variable になるのを防ぐ。LOW-D のガードは収集ループだけでなく
	# この表示ループにも必要）。
	if [ "${#missing_dir[@]}" -gt 0 ]; then
		for f in "${missing_dir[@]}"; do
			echo "  - $f" >&2
		done
	fi
	if [ "${#missing_required_dir[@]}" -gt 0 ]; then
		for f in "${missing_required_dir[@]}"; do
			echo "  - $f (git 管理外の必須ビルド成果物)" >&2
		done
	fi
	echo >&2
	echo "対処: gulpfile.js の dist タスクの対象パターンに含める（配布に必要な場合）か、" >&2
	echo "      bin/check-dist.sh の is_excluded() へ理由付きで追加する（配布に不要な場合）。" >&2
	exit 1
fi

echo "OK: ソースの追跡ファイル + 必須ビルド成果物（除外分を除く）はすべて ${DIST_DIR}/ に存在します。"

# ------------------------------------------------------------------------
# (2) Check that the zip is complete too (an extra check for the possibility that files
#     are dropped while zipping, even when the dist directory itself is correct).
# (2) zip の網羅性チェック（dist ディレクトリは正しくても、zip 化の過程で
#     ファイルが落ちる可能性を排除するための追加確認）
# ------------------------------------------------------------------------
if [ ! -f "$DIST_ZIP" ]; then
	echo "情報: ${DIST_ZIP} が見つからないため zip の中身チェックはスキップしました。" >&2
	exit 0
fi

# Without unzip, the rest of this section cannot verify anything, so check for it here.
# This check is placed after the DIST_ZIP existence check (rather than before) so that a
# case where only npm run copy was run (no zip yet, so the block above already exits 0)
# does not FAIL unnecessarily just because unzip happens to be missing.
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

# unzip -Z1: lists just the filenames, one per line (zipinfo-compatible mode). Directory
# entries (ending in /) and the zip's own top-level directory line are dropped, since they
# are not part of the comparison.
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
	# Same reasoning as above: guard missing_zip / missing_required_zip individually
	# before expanding them.
	# 上と同じ理由で、missing_zip / missing_required_zip も個別にガードしてから展開する。
	if [ "${#missing_zip[@]}" -gt 0 ]; then
		for f in "${missing_zip[@]}"; do
			echo "  - $f" >&2
		done
	fi
	if [ "${#missing_required_zip[@]}" -gt 0 ]; then
		for f in "${missing_required_zip[@]}"; do
			echo "  - $f (git 管理外の必須ビルド成果物)" >&2
		done
	fi
	exit 1
fi

echo "OK: ${DIST_ZIP} にもソースの追跡ファイル + 必須ビルド成果物（除外分を除く）がすべて含まれています。"
exit 0
