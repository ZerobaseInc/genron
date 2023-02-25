Genron
============

Drupal 9ウェブサイトです。「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従って初期構築しました。

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
- Xdebug 3.2

起動方法等
--------------

- `lando start` で起動します。
- `lando stop` で停止します。
- `.lando.yml` を書き換えたら、`lando rebuild` で再構築してください。
