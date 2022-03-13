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

### 余白の考え方 : has-background

#### CSSで抹殺

背景があると、コアが以下の余白を追加してくる

```
.has-background {
	padding: 1.25em 2.375em;
}
```

そもそも余白をどれだけつけるかは場所によって異なるし、
場所によってはコアが .has-background に padding を追加しないケースがあるので、余計な混乱を避けるために css で 0　指定しておく。

### 余白の考え方 : 上余白基準

【インライン指定】ここではブロックエディタ上で各要素に余白を指定する事によって、htmlタグ上に style="margin-top:0" のような形で出力される事を指します

gap を使用した場合にコアが下記のように上余白基準でCSSをあててくるため
blockGap を使用しない場合でも余白は margin-bottom:0; にして margin-top を使用する基準で考える

```
margin-top: var( --wp--style--block-gap );
margin-bottom: 0; 
```
#### theme.json で blockGap は null 指定する（ほぼ確定）

でないと margin-top に強めに追加されて以下のように追加される

```
.wp-container-61e0252313191 > * {
	margin-top: var( --wp--style--block-gap );
	margin-bottom: 0; 
}
```

これは以下のような弊害が出る

* h2 と h5 で異なる上部余白をつけたい場合
  - ブロック毎にいちいちインライン指定はやってられない
  - 普通に CSS ファイルから h2 及び h5 に異なる margin-top を指定したくても .wp-container-61e0252313191 > * の margin-top: var( --wp--style--block-gap ) や margin:0; がきつくてが上書きできない
  - --wp--style--block-gap を上書きすれば良いが 指定が遠回りで回りくどい。
  - --wp--style--block-gap を上書きしたとしても、margin-top 以外で使われる事も考えられるため、他に悪影響を及ぼす可能性がある。
* 独自に用意したclassに共通の余白のcss変数を割り振っておいて、「高度な設定」からclass名を入力して指定する事はできる
  - class名がテーマによって共通とは限らないので、テーマで余白用クラス作ってもプラグインに登録するパターンではどうせ使えない。
  - class名がふってあるかどうかはユーザーには気づきにくい

よって、__blockGap は null で指定__ するが、__コアに沿って各要素の余白は上につける基準__ で行う。

なお、グループ内の最初の見出しなどに余計な余白がついてしまうが、
ブロックで直接上部余白を0に指定すれば良い。
__※ コアと同じく同じくグループ内の最初の要素には上部余白を0にするなどの処理を入れるべきか要検討__


## テーマ内のパターンについて

* コアのブロックだけではそもそも致命的に足りないブロックが多くてまともなパターン作れない

=> プラグインから「余白設定 / ブロック / パターン」を管理した方がよっぽど効率が良いのでテーマで頑張る事自体時間の無駄。
=> テーマは本当に最小限の側だけなのでCSSなどは最小限になるようにインライン指定でOK。

---
## 左右余白
### コンテナサイズは一番外側のグループブロックでのみレイアウト継承を指定する

~~コンテナサイズに合わせたい場合は中に要素をグループ化して、そのグループをコンテナサイズにする指定にすれば良い~~
→ いちいちやってられないので一番外側でコンテナサイズを指定（デフォルトを継承）

カバーのインナーにCSSで余白指定すると幅広にできなくなる。

---

### ページヘッダーの見出し

#### 背景色をつけたい場合の問題

* 背景色を指定するが、中身が入らないケースがあるので、背景色を指定した div に padding 指定すると、中に文字の無い色だけの div が表示されるので、padding は 0 に指定し、中に入る要素の上下に余白を追加する。
* 行間で高さを確保すると、文字が多くて改行した場合に不自然になるのでNG

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
