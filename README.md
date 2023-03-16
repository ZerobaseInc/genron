# Genron Omega Prototype

ぼくのかんがえたさいきょうのウェブサイト for ゲンロン

または、人文知ドメインのコンテンツ構造をDrupal CMSを用いてプロトタイピングするデモンストレーション

## コンセプト

### ウェブサイトの究極目標

ゲンロン社のウェブサイトが最終的に到達すべき状態とは何か。それは「言論のポータルサイト」であり、いわば「人文知のウィキペディア」になることだと思う。具体的には、

- たいていの人文系キーワードでGoogle検索すると、検索結果の上位に genron.co.jp （のトップページではなく、トピックごとの下層ページ）が登場すること
- 人々が人文知に関して何か調べたいと思ったときに、最初に想起されるブランドが「ゲンロン」であり、アクセスされるウェブサイトが www.genron.co.jp であること
- 人文知に関する信頼のおけるデータソースとみなされ、人工知能の学習データソースとしても活用されること

などが考えられる。


### URLパターン例

genron.co.jp というドメイン名は、ウェブ上の人文知オーソリティに相応しい。以下のようなURLパターンによって「名は体を表す」：

- [https://www.genron.co.jp/people/hazuma](http://genron.herokuapp.com/people/hazuma)  
  → //言論/人物/東浩紀
- [https://www.genron.co.jp/literatures/otaku](http://genron.herokuapp.com/literatures/otaku)  
  → //言論/文献/動物化するポストモダン
- [https://www.genron.co.jp/events/genron-cafe-20221027](http://genron.herokuapp.com/events/genron-cafe-20221027)  
  → //言論/イベント/ゲンロンカフェ「シラスはウェブのなにをやりなおすのか」
- [https://www.genron.co.jp/keywords/correctibility](http://genron.herokuapp.com/keywords/correctibility)  
  → //言論/キーワード/訂正可能性


### ウェブサイトの要件

- ゲンロンの刊行物や主催イベントに限らず、古今東西の人文知コンテンツが大量に存在すること
- それぞれのコンテンツが「人物」「文献」「イベント」といったコンテンツ・タイプとして適切に構造化され、互いに関連付けられ、良質なハイパーテキスト構造を成していること
- それぞれのコンテンツに、十分な分量の、信頼できる情報が提供されていること
- コンテンツに適切なメタデータが付与され、マシン・リーダブルであること（検索エンジンや人工知能にとって利用しやすい形であること）

### プロトタイピング

そのようなウェブサイトの小規模な模型、いわゆるPoC（概念実証）やMVP（最小限の価値を提供するプロダクト）として、オープンソースCMS [Drupal](https://www.drupal.org/)を用いたノーコード（ないしローコード）でのプロトタイピングを実施する。

この模型には少量のコンテンツしか存在しないが、**スケーラブルな構造**となることを意図している。つまり、いずれ大量のコンテンツを投入しても破綻しないような、堅牢なコンテンツ構造を試作する目的である。

このような目的と、現実的な制約から、画面の見た目（ユーザー・インターフェイスのスタイリング）については最小限の手しか加えていない。なぜなら、画面の見た目は最終工程（仕上げ段階）で調整すれば済むからだ。

それよりも、**コンテンツ構造**の方が、はるかに重要である。コンテンツ構造の良し悪しは、コンテンツ・ビジネスの長期的な命運を左右する。適切な構造は、ユーザー・インターフェイスの技術革新や、デザインのトレンドに影響されることなく、長期にわたってビジネスの成長を支える基盤となる。

### 設計メモ

→Wikiページ「[設計メモ](https://github.com/ZerobaseInc/genron/wiki/%E8%A8%AD%E8%A8%88%E3%83%A1%E3%83%A2)」

### 参考文献

- [DESIGNING CONNECTED CONTENT デジタルプロダクトの長期的な成長を支える構造化コンテンツ、マイク・アザートン＋キャリー・ヘイン著、石橋秀仁監訳](https://www.amazon.co.jp/dp/4862465196/)

[
  ![『DESIGNING CONNECTED CONTENT デジタルプロダクトの長期的な成長を支える構造化コンテンツ』の表紙画像](9784862465191.jpg)
](https://www.amazon.co.jp/dp/4862465196/)


## ローカル開発環境

### 事前準備

- [Docker](https://www.docker.com/)と[Lando](https://lando.dev/)のインストール
- default.env を .env にリネーム

### 起動手順

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


### メモ

#### Landoの操作方法

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


#### Drupalのバージョンについて

このプロジェクトは、「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従い、Landoの `drupal9` レシピで初期構築したものです。しかし、どこかの時点で期せずしてDrupal 10にアップグレードしていました。その結果、現状ではDrupal 10になっています。
