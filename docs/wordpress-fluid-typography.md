# WordPress フルードタイポグラフィ 仕様まとめ

## フルードタイポグラフィとは

ビューポート（画面）幅に応じてフォントサイズを**なめらかに線形スケーリング**する仕組みです。
WordPress は theme.json の設定から CSS の `clamp()` 関数を自動生成します。

---

## 生成される CSS の構造

```css
font-size: clamp( 最小サイズ,  推奨値（線形補間）,  最大サイズ );
```

### 具体例（14px → 16px、360px → 1200px）

WordPress が実際に出力する形式：

```css
font-size: clamp(
  0.875rem,
  0.875rem + ((1vw - 3.6px) * 0.238),
  1rem
);
```

| ビューポート幅 | 適用されるフォントサイズ |
|---|---|
| 360px 未満 | 0.875rem = 14px（最小値で固定） |
| 360px〜1200px | 14px〜16px の間で線形スケール |
| 1200px 超 | 1rem = 16px（最大値で固定） |

---

## 推奨値（中間の式）の読み方

```
0.875rem + ((1vw  -  3.6px)  *  0.238)
  ↑           ↑        ↑          ↑
最小サイズ  現在の  最小VPでの   傾き
 (= 14px)   1vw値   1vw値      (自動計算)
           (基準)  (= 360÷100)
```

### 各パラメータの意味と計算方法

| パラメータ | 値 | 計算方法 |
|---|---|---|
| `0.875rem` | 14px | 最小フォントサイズをremに変換（14 ÷ 16） |
| `3.6px` | 360px ÷ 100 | 最小ビューポート幅での 1vw の値 |
| `1vw - 3.6px` | 0〜8.4px | 現在の1vwが最小VPの1vwをどれだけ超えているか |
| `0.238` | 傾き | `(最大 - 最小) ÷ (最大VPの1vw - 最小VPの1vw)`<br>= `(16 - 14) ÷ (12 - 3.6)` = `2 ÷ 8.4` |

> **要点：** `3.6px`（最小VPの1vw）と `0.238`（傾き）は WordPress が自動計算します。
> theme.json に min/max のフォントサイズとビューポート幅を指定するだけでOKです。

### 数式の等価性について

WordPress の出力形式と直感的な形式は、展開すると同じ式になります。

```
WordPress出力:  0.875rem + (1vw - 3.6px) × 0.238
直感的な形式:   14px + (100vw - 360px) × ((16-14) / (1200-360))

どちらも展開すると → 0.238vw + 13.143px  （同じ）
```

---

## 旧 X-T9 形式と WordPress 出力形式の比較

同じ設定（14px → 16px、VP: 360px → 1200px）を例に記載しています。

### theme.json の書き方

| | 旧 X-T9 形式 | 現在の WordPress 標準形式 |
|---|---|---|
| **グローバル fluid** | `"fluid": true` | `"fluid": { "minViewportWidth": "360px", "maxViewportWidth": "1200px" }` |
| **フォントサイズ指定** | `"size"` に clamp() を直書き | `"size"` にフォールバック値、`"fluid"` に min/max を宣言 |

```json
// 旧 X-T9 形式
{
  "name": "Medium",
  "slug": "medium",
  "size": "clamp(14px, calc( 14px + (100vw - 360px) * ( (16 - 14) / (1200 - 360)) ), 16px)"
}

// 現在の WordPress 標準形式
{
  "name": "Medium",
  "slug": "medium",
  "size": "16px",
  "fluid": {
    "min": "14px",
    "max": "16px"
  }
}
```

### CSS 出力の比較

| | 形式 | 出力される CSS |
|---|---|---|
| **旧 X-T9** | px ベース、100vw 使用 | `clamp(14px, calc(14px + (100vw - 360px) * ((16 - 14) / (1200 - 360))), 16px)` |
| **WordPress 標準** | rem ベース、1vw 使用、傾きを事前計算 | `clamp(0.875rem, 0.875rem + ((1vw - 3.6px) * 0.238), 1rem)` |

両者は記述形式が異なりますが、**計算結果（ブラウザでの挙動）は同一**です。

### 形式ごとの特徴

| | 旧 X-T9 形式 | WordPress 標準形式 |
|---|---|---|
| **可読性** | px で直感的に読める | rem で読みにくいが WordPress 標準 |
| **保守性** | 値の変更時に clamp() 全体を書き直す | min/max を変えるだけで自動再計算 |
| **グローバル fluid が true の場合** | ❌ WP がさらに fluid 計算を重ねて壊れる | ✅ 正しく動作 |
| **グローバル fluid が false の場合** | ✅ ブラウザがそのまま解釈するので動作 | ❌ fluid プロパティが無視される |

---

## theme.json の書き方

### 1. グローバル設定（ビューポート範囲の指定）

```json
"settings": {
  "typography": {
    "fluid": {
      "minViewportWidth": "360px",
      "maxViewportWidth": "1200px"
    }
  }
}
```

> `"fluid": true` と書くと WordPress デフォルト値（最小 320px / 最大 1600px）が使われます。
> ビューポート範囲を明示したい場合はオブジェクト形式で記述します。

---

### 2. フォントサイズごとの設定

#### フルードを有効にする場合

```json
{
  "name": "Medium",
  "slug": "medium",
  "size": "16px",
  "fluid": {
    "min": "14px",
    "max": "16px"
  }
}
```

| プロパティ | 役割 |
|---|---|
| `size` | fluid 非対応環境へのフォールバック値（通常は max と同じ値） |
| `fluid.min` | 最小ビューポート時のフォントサイズ |
| `fluid.max` | 最大ビューポート時のフォントサイズ |

#### フルードを無効にする場合（固定サイズ）

```json
{
  "fluid": false,
  "name": "Tiny",
  "slug": "tiny",
  "size": "10px"
}
```

---

## 設定の優先ルール

```
グローバル fluid が false
  └─ すべてのフォントサイズで fluid 無効（個別指定も無視される）

グローバル fluid が true またはオブジェクト
  └─ 個別に "fluid": false → そのサイズのみ固定
  └─ 個別に "fluid": { min, max } → そのサイズのみカスタム範囲
  └─ 個別指定なし → グローバルのビューポート範囲で自動計算
```

---

## X-T9 テーマでの実装例（theme.json）

```json
"typography": {
  "fluid": {
    "minViewportWidth": "360px",
    "maxViewportWidth": "1200px"
  },
  "fontSizes": [
    {
      "fluid": false,
      "name": "Tiny",
      "slug": "tiny",
      "size": "10px"
    },
    {
      "name": "Small",
      "slug": "small",
      "size": "13.91px",
      "fluid": {
        "min": "12.56px",
        "max": "13.91px"
      }
    },
    {
      "name": "Medium",
      "slug": "medium",
      "size": "16px",
      "fluid": {
        "min": "14px",
        "max": "16px"
      }
    }
  ]
}
```

### 上記から生成される CSS 変数（WordPress 実際の出力形式）

```css
--wp--preset--font-size--tiny:   10px;
--wp--preset--font-size--small:  clamp(0.785rem, 0.785rem + ((1vw - 3.6px) * 0.161), 0.869rem);
--wp--preset--font-size--medium: clamp(0.875rem, 0.875rem + ((1vw - 3.6px) * 0.238), 1rem);
```

---

## よくあるミス

### ❌ `size` に直接 clamp() を書く（グローバル fluid が有効な場合）

```json
{
  "name": "Medium",
  "slug": "medium",
  "size": "clamp(14px, calc(...), 16px)"
}
```

グローバルの `fluid` が有効だと WordPress がこの値に対してさらに fluid 計算を重ねてしまい、意図しない値になります。

### ✅ 正しい書き方

```json
{
  "name": "Medium",
  "slug": "medium",
  "size": "16px",
  "fluid": {
    "min": "14px",
    "max": "16px"
  }
}
```

---

## 参考

- [WordPress Developer Docs - Fluid Typography](https://developer.wordpress.org/block-editor/how-to-guides/themes/global-settings-and-styles/#typography)
- [theme.json Schema](https://raw.githubusercontent.com/WordPress/gutenberg/trunk/schemas/json/theme.json)
