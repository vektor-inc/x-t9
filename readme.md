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

### Spacing

@update 1.1.0

Specified from theme.json

| name | default |  |
|-|-|------------ |
| xxs | 0.375rem | Don't fit |
| xs | 0.75rem | For when you want narrower than normal paragraph margins  |
| sm | 1.5rem | Block margin / Gap margin |
| md | 2.4rem | Group margin |
| lg | 4rem | Section margin |
| xl | 6rem | Template bottom margin and so on |

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

---

### メインエリアをグループでラップするかどうか？

* ラップした場合グループの上下にpaddingを付与しない。
  → グループ解除した場合に消えるのでスペーサーで対応する

## Basefont size

360px : 14px -> 1200px : 16px 基準で自動可変

---

# Replace

Exclude : readme.md,gulpfile.js

"ref":11229,

#### .php のみ対象

```
src="http://localhost:8888/wp-content/themes/x-t9
src="' . esc_url( get_template_directory_uri() ) . '

"url":"http://localhost:8888/wp-content/themes/x-t9
"url":"' . esc_url( get_template_directory_uri() ) . '

url(http://localhost:8888/wp-content/themes/x-t9
url(' . esc_url( get_template_directory_uri() ) . '

href="http://localhost:8888/information/
href="' . esc_url( get_post_type_archive_link( 'post' )  ) . '

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

>Contact</
>' . esc_html__( 'Contact', 'x-t9' ) . '</

"Category : "
"' . esc_html__( 'Category : ', 'x-t9' ) . '"
```