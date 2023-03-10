# Genron

ゲンロンのウェブサイトを勝手にDrupalベースでリニューアルするプロトタイピング・プロジェクトです。


## 事前準備

- [Docker](https://www.docker.com/)
- [Lando](https://lando.dev/)
- default.env を .env にリネーム

## 開発手順

**サイト構築作業はローカル開発環境で行います。** 作業の成果を設定ファイルとして /config/ に書き出し、GitHubリポジトリ(ZerobaseInc/genron)にプッシュしてください。Heroku上の本番環境 <https://genron.herokuapp.com/> に自動デプロイされます。

**コンテンツ制作作業は本番環境で行います。** 必要に応じて、本番環境のデータベースを /data/dump.sql にダンプし、GitコミットしてGitHubにプッシュします。あるいは、ローカル開発環境に読み込み、コンテンツと設定を同期します。


## ローカル開発環境の起動方法

- `lando start` で起動します。
- `lando drush sql:cli < data/dump.sql` でデータベースを上書き更新します（初回は必須）。
- `lando drush config:import --source=../config` で（コンテンツは除いて）設定のみを読み込みます。

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
2. 作業の成果を `lando drush config:export --destination=../config` で /config/ に書き出します。
3. web/sites/default/files以下の画像ファイル等と一緒にGitコミットし、GitHubにプッシュ(`git push origin master`)します。


## コンテンツ制作作業

1. 本番環境で作業します。
2. 必要に応じてGitコミットします： `heroku run 'drush sql:dump' > data/dump.sql` で本番環境のデータベースを /data/dump.sql に書き出し、Gitコミットし、GitHubにプッシュします。
3. 必要に応じてローカル環境に同期します： `lando drush sql:cli < data/dump.sql` （※設定情報も同期されます）


## その他、Landoの操作方法

- `lando stop` で停止します。
- `lando rebuild` で .lando.yml や .env の更新を反映します。


## メモ

### Drupalのバージョンについて

このプロジェクトは、「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従い、Landoの `drupal9` レシピで初期構築したものです。しかし、どこかの時点で期せずしてDrupal 10にアップグレードしていました。その結果、現状ではDrupal 10になっています。
