# X-T9

![100%](https://raw.githubusercontent.com/vektor-inc/x-t9/master/screenshot.png)

The X-T9 is designed on the premise of full site editing function, and the user can flexibly customize the header, footer, etc. This theme is mainly intended for use on business sites.

---

## Develoment

```
npm install
```

sass watch
```
npm run watch
```

dist
```
npm run dist
```

---

### CSS naming

* [ Component name / Project name ]--[ attribute ]
* [ Component name / Project name ]__[ element name ]
* [ Component name / Project name ]__[ element name ]--[ attribute ]

---

## Memo（試行錯誤中）

### ほぼ確定の事項
### 余白の考え方

gap を使用した場合にコアが下記のように上余白基準でCSSをあててくるため
blockGap を使用しない場合でも余白は margin-bottom:0; にして margin-top を使用する基準で考える

```
margin-top: var( --wp--style--block-gap );
margin-bottom: 0; 
```
#### theme.json で blockGap は null 指定する（ほぼ確定）

でないと margin-top に強めに追加されて以下のように辛い

#### 各要素への余白の付与

管理画面からの余白指定によるインライン指定の場合、共通の余白を当てにくいので予め用意した共通の余白サイズを当てたいが...

* .wp-container-61e0252313191 > * など自動的に margin-top: var( --wp--style--block-gap ) や margin:0; を当てられてしまい、css から margin 指定しにくい
* インラインでいちいち margin-top:0 指定しないといけなかったり、margin-top:0; 指定がそもそも出来なかったりする
* 独自に用意したclassに共通の余白のcss変数を割り振っておいて、「高度な設定」からclass名を入力して指定する事はできるが、class名がテーマによって共通とは限らないので、テーマで余白用クラス作ってもプラグインに登録するパターンではどうせ使えない。
* コアのブロックだけではそもそも致命的に足りないブロックが多くてまともなパターン作れない

=> プラグインから「余白設定 / ブロック / パターン」を管理した方がよっぽど効率が良いのでテーマで頑張る事自体時間の無駄。

=> テーマは本当に最小限の側だけなのでCSSなどは最小限になるようにインライン指定でOK。

### コアが付与する余白

```
.has-background {
	padding: 1.25em 2.375em;
}
```

---
## 左右余白
### コンテナサイズはグループブロックに任せる

カバーのインナーに余白指定すると幅広にできなくなる。
コンテナサイズに合わせたい場合は中に要素をグループ化して、そのグループをコンテナサイズにする指定にすれば良い

---

### ページヘッダーの見出し

#### 背景色をつけたい場合の問題

* 文字が入らないケースがあるので、外側のグループブロックの背景色にするのはNG
* 行間で高さを確保すると、文字が多くて改行した場合に不自然になるのでNG

→ h1.has-background でのみのみ対応する
→ ただし、これもアーカイブタイトルだと余白が出力されないなどのコアのバグがあるので手動で追加（応急処置）
  → ★ と、思いきや、これだと文字数が多い場合にコンテンツサイズをはみ出す。外側のグループブロックに背景色をつけつつ、余白をゼロにして、タイトルが出力されない場合は高さ0のdivにするのが妥当っぽい

---

## 未確定：考察：メモ

#### 文字サイズベースで可変した方が良いケース

見出しなど文字に対する余白

#### 画面サイズベースで可変するもの

文字サイズ
ブロックスペース : 標準文字サイズを基準に可変

---
## Basefont size

360px : 14px -> 1200px : 16px 基準で自動可変
## 文字サイズジャンプ率

large : * 1.25
x-large : * 1.5
xX-large : * 1.5

## line-height

### heading

line-height : 1.5 
--wp--custom--typography--line-height--title : 1.5



## typography margin

### 見出し余白
### 段落余白
##### 見出し


通常文章 : 1.7
--wp--custom--typography--line-height--normal

 1.75em - 0.75em
#### 文字の余白

| | サイズ | 変数 |
|-| ------------- | ------------- |
| 通常文章 | 1.5em = 0.5em + 1em  |   |
| 投稿リストなどの要素内 | 0.75em  | site_type  |

#### ブロック上下（Gap）

文字サイズ基準 : 2em
