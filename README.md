# Web版総明会グルメガイドAPI

## 環境構築

以下の2つが使用できる状態になっている必要があります。

- docker

- docker-compose

全てのコンテナを起動するためには以下のコマンドを打ちます。

```
cd WebSoumeikaiGourmetApi
docker-compose up -d
```

APIコンテナに入るためには以下のコマンドを打ちます。

```
docker-compose exec php bash
```

環境設定、マイグレーションは以下のコマンドを打ちます。

```
cp .env.example .env
php artisan key:generate
php artisan migrate
```
