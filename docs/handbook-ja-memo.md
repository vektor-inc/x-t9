2023.5.19 の Aich WordPress MeetUP は概ねここまで

==============================================================

----------------------------------------------------------------

以下過去のメモなので情報が古かったりします...スルーしてください

## 少し高度なカスタマイズ

### サイドバーの幅を変更する

* theme.json を子ページに複製して編集

---

## フルサイト編集を理解する

### テンプレートパーツとパターンの違い

#### パターン
* レイアウトの見本

#### テンプレートパーツ
* 使用中のサイトで実際に利用するパーツ

例）
* 通常のヘッダー
* LP用（ナビゲーションがないなど）のヘッダー
* トップページ用の透過ヘッダー



* VK Dynamic If Block


# X-T9 でフルサイト編集を体験してみよう 2
ファイルでのカスタマイズ

# ブロックテーマの構造をみてみよう 

## PHPファイルではなくhtmlファイルで構成されている

* phpのテンプレートファイルはありません
* template と parts ディレクトリがある
* この中にhtml保存される
* single.htmlを変更してみる

## theme.json を見てみよう

色々な設定が書いてあります

* font-size を変更してみる
* 幅を変更してみる

## テーマファイルから改変してみる

* front-page.html を改変しても変更されない
* さっき編集したから
* テンプレート一覧を確認する 改変マークがついてる

制作だとファイルで管理しておきたい

* エクスポートする
* 親テーマに上書き → 改変する
* 確認する → 変わってない → リセットする → 反映される

ある程度一気に作業してから１日の作業の終わりにファイルエクスポートしてコミットとか？

## 子テーマで編集した内容をファイルで管理する

子テーマが使えます

 * 有効化します
 * front-page 改変
 * エクスポートしたファイルを配置する
 * 反映されない → リセットする → 反映される

### theme.json の上書き

theme.jsonも変更したい値だけ書けばマージされる

* カラーパレットを上書きしてみる

---

# さいごに

まだまだ実際に運用するサイトとして使ってみようとすると困る場面も多いと思いますが、フルサイト編集でどんな感じになるのかのイメージが伝われば幸いです。

是非やってみてください。

