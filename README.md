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

環境設定、マイグレーションなどは以下のコマンドを打ちます。

```
apt-get install zip unzip git
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer install
chmod -R 777 ./storage/
chmod 777 ./bootstrap/cache/
cp .env.example .env
php artisan key:generate
php artisan admin:install
# php artisan migrate
php artisan storage:link
cp ./database/data/images/* ./storage/app/public/images/
```
