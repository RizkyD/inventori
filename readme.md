<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Under Development

Hello,
these are the few things that you need to do and have before using this application:

Browser.
Xampp(Windows)/Lampp(linux)
Text editor ex:Sublime Text,VSC,etc.
Command Prompt/Terminal
The project file.


Server Requirement

PHP >= 7.2
Composer


Instalation

- Clone Project
- Run Composer Install in cmd/console
- create .env to root folder project
- Copy env from .env example
- type "php artisan key:generate"
- input on env :
DB_DATABASE= (your database name)
DB_USERNAME= (your mysql username)
DB_PASSWORD= (your mysql password) *if u dont use password just empty it
- migrate seeder : 'php artisan migrate --seed'

Running Application
- open cmd direct file to this project
example : cd:/d/inventori *can be put anywhere this project/application
- type "php artisan serve"
- open your browser
- input "localhost:8000"
- enjoy