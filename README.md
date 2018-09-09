# b-pcard

Google Cloud Platform を使った（実装が）簡単な名刺読込サービス

## ライブラリインストール

```bash
composer require google/cloud
```

## 認証ファイル作成

1. Google Cloud Platformのコンソールの「APIとサービス」→「認証情報」で「サービスアカウントキー」を作成する。キーのタイプはJSON。  
1. JSONをダウンロードしたら外部から閲覧できないフォルダに配置する。**外部からは見えないこをと確認する**。
1. config.php にProjectIDとキーファイル（JSON）のパスを記述

## ファイル構成

- config.php 設定ファイル（要作成）
- index.php メイン処理
- entry.php 入力画面
- result.php 結果画面
- coposer.json

### config.php

中身

```php
<?php
# 認証情報セット
# Google Cloud Platform の APIとサービス -> 認証情報 から作成したJSON
putenv("GOOGLE_APPLICATION_CREDENTIALS=JSON FILE PATH');

# Your Google Cloud Platform project ID
$projectId = 'ProjectId';
```