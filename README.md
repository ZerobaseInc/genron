# Genron Omega

ぼくのかんがえたさいきょうのウェブサイト for ゲンロン

または、人文知ドメインのコンテンツ構造をDrupal CMSを用いてプロトタイピングするデモンストレーション

## コンセプト

ゲンロン社のウェブサイトの最終形態を「言論のポータルサイト」「人文知のウィキペディア」であると幻視する。具体的には、

- 人文系キーワードでGoogle検索すると、かならず検索結果の上位にゲンロン・ウェブサイトが登場
- それゆえ人々が人文知に関して何か調べたいと思ったときに最初に想起されるブランド
- AIにとっても信頼に値する人文系知識のデータソース

といった理想状態を考える。

そのようなウェブサイトの要件としては、ゲンロンの刊行物、主催イベント、関係者などに限らず、「人文知のウィキペディア」に掲載されているべき（特筆性のある）文献・イベント・人物といったコンテンツは漏れなく掲載されていなければならない。

例えば、

- ハイデガーという人物
- 『存在と時間』という文献
- カッセル講演というイベント

などといった人文系知識のコンテンツが大量に存在すること。それぞれのコンテンツには、十分な分量の、信頼できる記述が提供されていること。また、適切なメタデータが付与され、セマンティック・ウェブ対応していること、などである。

そのような理想のウェブサイトの小規模なスタディ、いわゆるPoC（概念実証）やMVP（最小限の価値を提供するプロダクト）として、オープンソースCMS [Drupal](https://www.drupal.org/)を用いてノーコードでプロトタイピングする。

このプロダクト（プロトタイプ）には少量のコンテンツしか存在しないが、**スケーラブルな構造**を意図している。つまり、大量のコンテンツを投入しても破綻しないような、堅牢なコンテンツ構造を作ることを目的としている。

このような目的と、現実的な制約から、画面の見た目（ユーザー・インターフェイスのスタイリング）については最小限の手しか加えていない。なぜなら、画面の見た目は最終工程（仕上げ段階）で調整すれば済む。それよりも、直接は目に見えない**コンテンツ構造**の方が、はるかに重要である。コンテンツ構造の良し悪しは、コンテンツ・ビジネスの長期的な命運を左右する重要な要素である。


## 事前準備

- [Docker](https://www.docker.com/)と[Lando](https://lando.dev/)のインストール
- default.env を .env にリネーム

## ローカル開発環境の起動手順

`lando start` でアプリ(appserver)が起動します。正常に起動すると、下記のようにURLが表示されます：

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

この段階では、まだアプリが正常に動作しません。引き続き下記の手順を進めてください：

1. `lando composer install` で依存モジュールをインストールします。
2. `lando drush sql:cli < data/dump.sql` でデータをインポートします。
3. `lando drush config:import --source=../config` でローカルの設定(/config/)を反映します。
4. `lando drush cache:rebuild` でキャッシュを再構築します。これで準備完了です。

前述の 'http://localhost' から始まるリンクを開いてください。この例の場合は `http://localhost:58722` となります。ユーザーadmin、パスワードadminでログインできます。

### メモ

- ポートは起動のたびに変わります。
- 動作中のappserverのURLは、`lando info | grep http` でいつでも確認できます。


## 開発手順

### サイト構築作業

**サイト構築作業はローカル開発環境で行います。** 作業の成果を設定ファイルとして /config/ に書き出し、GitHubリポジトリ(ZerobaseInc/genron)にプッシュしてください。Heroku上の本番環境 <https://genron.herokuapp.com/> に自動デプロイされます。

1. ローカル開発環境で作業します。
2. `bin/export-config.sh` を実行し、作業の成果を /config/ に書き出します。
3. web/sites/default/files以下の画像ファイル等と一緒に git commit、git pushします。


### コンテンツ制作作業

**コンテンツ制作作業は本番環境で行います。** 必要に応じて、本番環境のデータベースを /data/dump.sql にダンプし、GitコミットしてGitHubにプッシュします。あるいは、ローカル開発環境に読み込み、コンテンツと設定を同期します。

1. 本番環境でコンテンツ制作作業をします。
2. ローカル開発環境の設定を /config/ に書き出しておくため、`bin/export-config.sh` を実行します。
3. `bin/pull-data.sh` を実行し、本番環境のデータをローカル開発環境に同期します。
4. `bin/restore-config.sh` を実行し、ローカル開発環境の設定を /config/ から復元します。
5. 必要なら git commit、git pushします。

※手順3でローカル開発環境の設定が失われてしまうので、あらかじめ手順2で設定をエクスポートしておき、手順4で復元します。

TODO: コンテンツをローカル開発環境ないしステージング環境で制作し、本番環境に一括で差分投入する方法を確立する #12


## メモ

### Landoの操作方法

Dockerコンテナの停止
: `lando stop`

Dockerコンテナの再構築
: `lando rebuild`
  - .lando.yml や .env の更新を反映します。
  - データは維持されます。

キャッシュ再構築
: `lando drush cache:rebuild`
  - 画面表示がおかしい時などに、キャッシュを再構築します。

初期化・再構築
: `lando destroy && lando start`
  - 必要に応じて、事前に設定やデータを保存してから実行してください。
  - `lando start` 以降の手順は、前述の「ローカル開発環境の起動手順」の通りです。


### Drupalのバージョンについて

このプロジェクトは、「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従い、Landoの `drupal9` レシピで初期構築したものです。しかし、どこかの時点で期せずしてDrupal 10にアップグレードしていました。その結果、現状ではDrupal 10になっています。
