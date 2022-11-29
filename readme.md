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

### Colors

| Color name |  |
|-| ------------- |
| text-normal | 通常テキスト色 |
| text-secondary | 少し色を薄くするなど、通常文字色より目立たなくする色 |
| border-normal | 白背景の線色  |
| bg-light-gray | 背景アクセント用の明るい灰色 |
| text-normal-darkbg | 背景色が濃い場合のテキスト色 |
| text-secondary-darkbg | 背景色が濃い場合のセカンダリ色 |
| border-normal-darkbg | 背景色が濃い場合の線色 |

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


| Spacing |  |
|-| ------------- |
| xs | 詰めたいがびたっとつくのはまずい場合  |
| sm | 通常の間隔より狭い  |
| md | 段落など通常のブロック要素の余白 |
| lg | 複数のブロックの塊 |
| xl | セクション最内側など |

---

### メインエリアをグループでラップするかどうか？

* ラップした場合グループの上下にpaddingを付与しない。
  → グループ解除した場合に消えるのでスペーサーで対応する

### ページヘッダーの見出し

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

---

# Replace

Exclude : readme.md,gulpfile.js

"moreText":"続きを読む"
"moreText":"Read more"

>お知らせ</
>Information</

"ref":11229,

#### .php のみ対象

src="http://localhost:8888/wp-content/themes/x-t9
src="' . esc_url( get_template_directory_uri() ) . '

href="http://localhost:8888/information/
href="' . esc_url( get_post_type_archive_link( 'post' )  ) . '

"url":"http://localhost:8888/wp-content/themes/x-t9
"url":"' . esc_url( get_template_directory_uri() ) . '

url(http://localhost:8888/wp-content/themes/x-t9
url(' . esc_url( get_template_directory_uri() ) . '

"moreText":"Read more"
"moreText":"' . esc_html__( 'Read more', 'x-t9' ) . '"

>Service</
>' . esc_html__( 'Service', 'x-t9' ) . '</

>Information</
>' . esc_html__( 'Information', 'x-t9' ) . '</

>Read more</
>' . esc_html__( 'Read more', 'x-t9' ) . '</

>Main Column</
>' . esc_html__( 'Main Column', 'x-t9' ) . '</

>Side Column</
>' . esc_html__( 'Side Column', 'x-t9' ) . '</

