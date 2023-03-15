# Genron

ゲンロンのウェブサイトを勝手にDrupalベースでリニューアルするプロトタイピング・プロジェクトです。


## 事前準備

- [Docker](https://www.docker.com/)と[Lando](https://lando.dev/)のインストール
- default.env を .env にリネーム

## 開発手順

**サイト構築作業はローカル開発環境で行います。** 作業の成果を設定ファイルとして /config/ に書き出し、GitHubリポジトリ(ZerobaseInc/genron)にプッシュしてください。Heroku上の本番環境 <https://genron.herokuapp.com/> に自動デプロイされます。

**コンテンツ制作作業は本番環境で行います。** 必要に応じて、本番環境のデータベースを /data/dump.sql にダンプし、GitコミットしてGitHubにプッシュします。あるいは、ローカル開発環境に読み込み、コンテンツと設定を同期します。


## ローカル開発環境の起動方法

- `lando start` で起動します。
- `bin/pull-data.sh` で本番環境のデータベースに同期します。

起動後は下記のようなメッセージが出ます：

```
Here are some vitals:

 NAME             genron                                   
 LOCATION         /Users/hideishi/Repos/genron             
 SERVICES         appserver, database, mailhog, phpmyadmin 
 APPSERVER URLS   https://localhost:58721                  
                  http://localhost:58722                   
                  http://genron.lndo.site/                 
                  https://genron.lndo.site/                
 MAILHOG URLS     http://localhost:58720                   
 PHPMYADMIN URLS  http://localhost:58718                  
 ```

`APPSERVER URLS` の 'http://localhost' から始まるリンクを開いてください。この例の場合は `http://localhost:58722` となります。このポートは毎回変わります。ログインはadmin/adminです。

なお、同URLは `lando info | grep http` でいつでも確認できます。


## サイト構築作業

1. ローカル開発環境で作業します。
2. `bin/export-config.sh` を実行し、作業の成果を /config/ に書き出します。
3. web/sites/default/files以下の画像ファイル等と一緒に git commit、git pushします。


## コンテンツ制作作業

1. ローカル開発環境の設定を /config/ に書き出しておくため、`bin/export-config.sh` を実行します。
2. 本番環境でコンテンツ制作作業をします。
3. `bin/pull-data.sh` を実行し、本番環境のデータをローカル開発環境に同期します。
4. `bin/restore-config.sh` を実行し、ローカル開発環境の設定を /config/ から復元します。
5. 必要なら git commit、git pushします。


## その他、Landoの操作方法

- `lando stop` で停止します。
- `lando rebuild` で .lando.yml や .env の更新を反映します。
- `lando destroy` ですべてを破棄します。そこから `lando start`, `lando composer install`, `bin/pull-data.sh` とすれば、ローカル開発環境を初期化（本番環境のクローンに戻すこと）ができます。

## メモ

### Drupalのバージョンについて

このプロジェクトは、「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従い、Landoの `drupal9` レシピで初期構築したものです。しかし、どこかの時点で期せずしてDrupal 10にアップグレードしていました。その結果、現状ではDrupal 10になっています。
