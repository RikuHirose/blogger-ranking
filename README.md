# Shunta Web App

## Descriptions


## How To Set Up This App

For Laradock, read →　https://note.mu/n_oshiumi01/n/n2b4c81ab127e

1. Copy .env.example to .env
2. Run `composer install`
3. Run `npm install`
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan admin:install`
7. Run `php artisan db:seed`


## Start server

For local,
```
php artisan serve
```

## Front-end Dev

- For development
```
npm run dev
```
```
npm run watch
```
## admin
1. Run `php artisan admin:install`
2. Open `http://localhost/admin/` in browser, use username `admin` and password `admin` to login.

for more detail
read https://qiita.com/pikonori/items/a04066010e7380b3ee38
     https://github.com/z-song/laravel-admin