# Genron Omega Prototype

ぼくのかんがえたさいきょうのウェブサイト for ゲンロン

または、人文知という領域（ドメイン）のコンテンツ構造を、Drupal CMSを用いて勝手にプロトタイピングするデモンストレーション

## これは何？

部外者が勝手にゲンロン・ウェブサイトのあるべき姿を構想・設計してみた実験的プロトタイプです。いわゆる「[スペキュラティブ・デザイン](https://ja.wikipedia.org/wiki/%E3%82%B9%E3%83%9A%E3%82%AD%E3%83%A5%E3%83%A9%E3%83%86%E3%82%A3%E3%83%96%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3)」や「[ペーパー・アーキテクチャ](https://ja.wikipedia.org/wiki/%E3%83%9A%E3%83%BC%E3%83%91%E3%83%BC%E3%83%BB%E3%82%A2%E3%83%BC%E3%82%AD%E3%83%86%E3%82%AF%E3%83%88)」です。

もう少し具体的に言えば、このサイトは**コンテンツ構造のプロトタイプ**です。少量のコンテンツしかありませんが、想像力を働かせることで、このプロトタイプの意図を読み取ることができます。つまり、このウェブサイトの構造上に、下記のような膨大なコンテンツが掲載されていること（スケールアップした姿）を想像しながらブラウジングしてみてください：

- ゲンロンの全刊行物（数百？）および全記事（数千？）
- 寄稿した全著者（数百？）
- ゲンロンカフェの全イベント（数百？）および全登壇者（数千？）
- それらの文献やイベントで言及されたキーワード（数千？）

まずはここから → 人物ページ「[東浩紀](https://genron.herokuapp.com/people/hazuma)」

GitHubはこちら → [ZerobaseInc/genron](https://github.com/ZerobaseInc/genron)

## コンセプト

### ウェブサイトの究極目標

ゲンロン社のウェブサイトが最終的に到達すべき状態とは何でしょうか。それは「言論のポータルサイト」であり、いわば「人文知のウィキペディア」になることだと思います。具体的には、

- たいていの人文系キーワードでGoogle検索すると、検索結果の上位に genron.co.jp （のトップページではなく、トピックごとの下層ページ）が登場すること
- 人々が人文知に関して何か調べたいと思ったときに、最初に想起されるブランドが「ゲンロン」であり、アクセスされるウェブサイトが www.genron.co.jp であること
- 人文知に関する信頼のおけるデータソースとみなされ、人工知能の学習データソースとしても活用されること

などが考えられます。


### ドメインとURI

genron.co.jp というドメイン名は、ウェブ上の人文知オーソリティに相応しいものだと思います。以下のようなURI命名規則によって、まさに「名は体を表す」でしょう：

- [https://www.genron.co.jp/people/hazuma](http://genron.herokuapp.com/people/hazuma)  
  → //言論/人物/東浩紀
- [https://www.genron.co.jp/works/literature-hazuma_doubutsuka_suru_postmodern](http://genron.herokuapp.com/works/literature-hazuma_doubutsuka_suru_postmodern)  
  → //言論/作品/動物化するポストモダン
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

そのようなウェブサイトの小規模な模型、いわゆるPoC（概念実証）やMVP（最小限の価値を提供するプロダクト）として、オープンソースCMS [Drupal](https://www.drupal.org/)を用いたノーコード（ないしローコード）でのプロトタイピングを実施します。

この模型には少量のコンテンツしか存在しませんが、**スケーラブルな構造**となることを意図しています。つまり、いずれ大量のコンテンツを投入しても破綻しないような、堅牢なコンテンツ構造を試作することが目的です。

このような目的と、現実的な制約から、画面の見た目（ユーザー・インターフェイスのスタイリング）については、最小限の手しか加えません。なぜなら、画面の見た目は最終工程（仕上げ段階）で調整するものだからです。

それよりも、**コンテンツ構造**の方が、はるかに重要なのです。コンテンツ構造の良し悪しは、コンテンツ・ビジネスの長期的な命運を左右します。適切な構造は、ユーザー・インターフェイスの技術革新や、デザインのトレンドに影響されることなく、長期にわたってビジネスの成長を支える基盤となります。

### 設計メモ

- 作品の参照関係を双方向に辿れる。「参考文献」の逆リンクである「この文献*を*参照している文献」。ブログのトラックバックに相当するもの（例：「[内省と遡行](/works/literature-karatani_naise_to_sokou)」と「[存在論的、郵便的](/works/literature-hazuma_sonzaironteki_yubinteki)」）。
- 「テキストが参照しているアート作品」「イベントが参照しているアート作品」のように、異なるコンテンツタイプ間の関係性も、双方向に辿れる（例：「[ゲンロン友の会第13期総会](/events/genron_tomonokai_sokai_13)」と「[うさぎ、美術の良識からの逸脱 no.10](/works/yoichi_umetsu-usagi-10)」）。
- [実装前の手書き設計メモ](https://github.com/ZerobaseInc/genron/wiki/%E8%A8%AD%E8%A8%88%E3%83%A1%E3%83%A2)

### 参考文献

- [DESIGNING CONNECTED CONTENT デジタルプロダクトの長期的な成長を支える構造化コンテンツ、マイク・アザートン＋キャリー・ヘイン著、石橋秀仁監訳](https://www.zerobase.jp/2022/02/08/designing-connected-content.html)

---

（以下、開発マニュアル）

## ローカル開発環境

### 事前準備

- [Docker](https://www.docker.com/)、[Lando](https://lando.dev/)、[Heroku CLI]()のインストール
- `cp default.env .env` して `S3_ACCESS_KEY` と `S3_SECRET_KEY` を設定
- `heroku git:remote -a genron`

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
2. `bin/pull-data.sh` でデータをインポートします。
3. `bin/restore-config.sh` でローカルの設定(/config/)を反映し、キャッシュを再構築します。これで準備完了です。

前述の 'http://localhost' から始まるリンクを開いてください。この例の場合は `http://localhost:58722` となります。ユーザーadmin、パスワードadminでログインできます。

### メモ

- ポートは起動のたびに変わります。
- 動作中のappserverのURLは、`lando info | grep http` でいつでも確認できます。


## 開発手順

### サイト構築作業

**サイト構築作業はローカル開発環境で行います。** 作業の成果を設定ファイルとして /config/ に書き出し、GitHubリポジトリ(ZerobaseInc/genron)にプッシュしてください。Heroku上の本番環境 <https://genron.herokuapp.com/> に自動デプロイされます。

1. ローカル開発環境で作業します。
2. `bin/export-config.sh` を実行し、作業の成果を /config/ に書き出します。
3. `git commit`、`git push`します。

なお、本番環境で設定を変更した場合は、 `bin/pull-data.sh` と `bin/export-config.sh` を実行してから `git commit` してください。


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

#### Herokuの操作方法

本番環境のキャッシュ再構築
: `heroku run -a genron drush cache:rebuild`

#### Drupalのバージョンについて

このプロジェクトは、「[Docker+Landoで簡単、Drupalローカル環境の構築方法（Acquiaウェブサイト）](https://www.acquia.com/jp/blog/how-to-use-lando-for-building-drupal-local-environment)」の手順に従い、Landoの `drupal9` レシピで初期構築したものです。しかし、どこかの時点で期せずしてDrupal 10にアップグレードしていました。その結果、現状ではDrupal 10になっています。
