<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Voucher

***Caso tenha duvidas em instalar o php, composer, laravel, no windows [PHP-COMPOSER-LARAVEL](https://gist.github.com/gladson/bfd863cb88d66f84b2fde8929265553a#file-composer_laravel-md)***

### Instalação

```shell
$ git clone https://github.com/gladson/laravel-nvoucher.git
$ cd laravel-nvoucher
$ composer install
or
$ composer update

$ php artisan migrate
```

### Gerar Usuarios Fakes:

```shell
$ php artisan tinker
	>>> Psy Shell v0.8.1 (PHP 7.0.4 ÔÇö cli) by Justin Hileman
	>>> factory(App\User::class, 10)->create();
```

## BrowserSync

### Instalação

1. (Node.js)[https://nodejs.org/en/] => instalação é moleza!!!
´´´shell
	$ node -v
	$ v7.5.0
	$ npm -v
	$ 4.1.2
´´´

2. Browsersync é um modulo do Node.js
´´´sheel
	$ npm install -g browser-sync
	$ browser-sync start --open http://127.0.0.1:8000/ --browser firefox --files 'app' 'resources' 'routes' 'database' 'public' '.env'
´´´

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).