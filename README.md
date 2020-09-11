# チーム「ワイハリマ」
### メンバー
* [yuta1024](https://github.com/yuta1024)
* [nhirokinet](https://github.com/nhirokinet)
* [tyabuki](https://github.com/tyabuki)

### 過去
* ISUCON7
  - [nhirokinet/isubata](https://github.com/nhirokinet/isubata)
* ISUCON8
  - [yuta1024/isucon8](https://github.com/yuta1024/isucon8)
  - [yuta1024/isucon8-infra](https://github.com/yuta1024/isucon8-infra)
* ISUCON9
  - [yuta1024/isucon9](https://github.com/yuta1024/isucon9)
* ISUCON10
  - [tyabuki/isucon10](https://github.com/tyabuki/isucon10)

# ISUCON10
* [ISUCON10 Portal](https://portal.isucon.net/)
  - [ISUCON10 予選レギュレーション : ISUCON公式Blog](http://isucon.net/archives/54753430.html)
* [ISUCON公式Blog](http://isucon.net/)
  - [ISUCON10 まとめ : ISUCON公式Blog](http://isucon.net/archives/54704557.html)

### 予選日時
2020年9月12日(土) 10:00〜18:00(JST)

### 今の所わかっていること (2020-09-11)
* OS - Ubuntu (バージョン不明)
* 参考実装 - Go, Node.js, Perl, PHP, Python, Ruby, Rust
  - チームワイハリマはPHPを選択 (去年のisucon以来書いてないけど)
* いつもどおり、以下は変えてはいけない
  - アクセス先のURI、ただしサーバー側で生成する部分（IDなど）は文字種（[0-9] や [0-9a-zA-Z_] など）を変えない範囲で自由に生成しても良い
  - レスポンス (HTMLのDOM, JSONオブジェクト等) の構造（表示に影響しない範囲での空白文字の増減は許可される）
  - JavaScript/CSSファイルの内容
  - 画像および動画等のメディアファイルの内容
* いつもどおり、以下を満たしている必要がある
  - コンテスト進行用のメンテナンスコマンドが正常に動作するよう互換性を保つこと
  - サーバ再起動後にすべてのアプリケーションコードが正常動作する状態を維持すること
  - ベンチマーク実行時にアプリケーションに書き込まれたデータは再起動後にも取得できること
* サーバへの接続は、踏み台サーバを経由したSSHで実施する
  - GitHubアカウントに登録されている公開鍵がサーバに設定済みとのこと
  - 例年のようにIaaSのコンソールが与えられる訳ではないようだ
* 本選出場チームの選出は、(最高スコアではなく)最終ベンチのスコアによって行われる

### 当日明かされること
* ソフトウェアの中身とミドルウェアなど
* 接続先のサーバ (台数やスペックも含む)
* Ubuntuのバージョン
* 採点方式
