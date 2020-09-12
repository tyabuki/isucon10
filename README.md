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
2020年9月12日(土) 12:20〜20:20(JST)

### 今の所わかっていること (2020-09-11時点)
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

### ミドルウェアに関する基本的な戦略 (2020-09-11時点)
```
PHP
・Ubuntu 20.04 標準 (7.4.3-4ubuntu2.2) -> そのまま使う
・独自謎バイナリ -> 同上のもの (20.04 標準) にする
・20.04 ではない -> いつもどおり ondrej の 7.4.10 にする

MySQL
・Ubuntu 20.04 標準　(8.0.21-0ubuntu0.20.04.4)
   -> mariadb-server (10.3.22-1ubuntu1) にする
   -> 万が一問題があったらいつもどおりの Percona server (8.0.20-11-1.focal) にする
・独自謎バイナリ -> 同上
・20.04 ではない -> いつもどおりの Percona server にする

Nginx
・Ubuntu 20.04 標準 (1.18.0-0ubuntu1) -> そのまま使う
・独自の謎バイナリ -> いつもどおり Nginx の公式repoから mainline の最新を入れる
・Nginxではない何かが動いている -> 同上
・20.04 ではない -> 同上
```

##### 備考
* MySQL(< 8.20.22) は [謎のバグ](https://jira.percona.com/browse/PS-7221) があるのを覚えておく
  - Ubuntu 20.04 の mysql-server も、現時点の最新の Percona server も直っていないが、たぶんISUCONでは関係ないと思う
* `mysql-server` から `mariadb-server` に置き換えた際に apparmor がグダグダ言い出す場合
  - `sudo aa-remove-unknown` または reboot
  - https://narusejun.com/archives/24/
* そもそも apparmor はいらない
  - systemd で切るだけで良いっぽい
  - https://linuxconfig.org/how-to-disable-apparmor-on-ubuntu-20-04-focal-fossa-linux
* mysql-server を mariadb-server に置き換える際は `/etc/mysql` と `/var/lib/mysql` を吹き飛ばしてから
  - パッケージ自体は mariadb-server だけ入れれば dependency と conflict の指定がうまい感じにやってくれる
  - `/var/lib/mysql` を吹き飛ばした場合 root パスワードは消えてるので再設定してね
* ondrej の repo
  - https://launchpad.net/~ondrej/+archive/ubuntu/php?field.series_filter=focal
* Percona server の repo
  - https://www.percona.com/doc/percona-server/LATEST/installation/apt_repo.html
  - (deb) https://www.percona.com/downloads/Percona-Server-LATEST/
* nginx の repo
  - https://nginx.org/en/linux_packages.html#Ubuntu
