Genron
============

[Lando](https://lando.dev/)で構築したDrupal 10ウェブサイトです。「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従って初期構築しました。

起動方法
------------

- `lando start` で起動します。
- `lando drush sql:cli < data/dump.sql` でデータベースを上書き更新します（初回は必須）。
- `lando drush config:import --source=../config` で設定をインポートします（初回は必須）。

起動したら、下記のようなメッセージが出ますので、 `APPSERVER URLS` の 'http:' から始まるリンクを開いてください：

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

この例の場合は `http://localhost:58722` となります。このポートは毎回変わります。ログインはadmin/adminです。


作業のコミット
--------------

1. `lando drush sql:dump > data/dump.sql` でデータベースをダンプします。
2. `lando drush config:export --destination=../config` で設定をエクスポートします。

以上2点を、web/sites/default/files以下の画像ファイル等と一緒にGitコミットしてください。


その他、Landoの操作方法
-----------------------

- `lando stop` で停止します。
- `lando rebuild` で .lando.yml や .env の更新を反映します。


構成
--------------

- Docker Desktop 4.14
- Lando 3.6
- PHP 8.1
- Composer 2.2
- Drupal 9
- MySQL 5.7
- MailHog 1.0
- phpMyAdmin 5.1
