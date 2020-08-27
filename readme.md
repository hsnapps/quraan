<p align="center"><img src="https://formizer.iamhassan.info/cdn/images/logo.png"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Holy Quran API
#### Version 1.1
## Find full API documentation [here](https://documenter.getpostman.com/view/257609/TVCb2VK6)

##### Server Requirements [Find on Laravel Docs](https://laravel.com/docs/5.5/installation#server-requirements)
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

##### To prepare the server follow the folloing steps:
1. Clone this repo.
2. Get insde the repo directory `$ cd quraan`.
3. Request dependencies `$ composer install`
4. Create the environment file (.env) by compying the file .env.example `$ cp .env.example .env`
5. Create the database (MySql o MaraiDB) and change the database parameters in the .env file.
6. Migrate the and seed database `$ php artisan migrate --seed`
7. Test the API `$ php artisan serve`
---
