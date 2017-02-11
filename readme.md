<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Voucher

### Link do site teste:

<p align="center">
	<a href="http://nvoucher.herokuapp.com/">
		<img height="64" width="240" src="http://i.imgur.com/3Vex140.png">
	</a>
</p>

### Instalação (PHP-COMPOSER-LARAVEL)

***Caso tenha duvidas em instalar o php, composer, laravel, no windows [PHP-COMPOSER-LARAVEL](https://gist.github.com/gladson/bfd863cb88d66f84b2fde8929265553a#file-composer_laravel-md)***

### Instalação (Projeto)

```shell
$ git clone https://github.com/gladson/laravel-nvoucher.git
$ cd laravel-nvoucher
$ composer install
or
$ composer update

$ php artisan migrate
```

### Gerar Usuarios Fakes:

1 - Método agil (Recomendado)

```shell
$ php artisan migrate:refresh --seed
```

***Caso haja algum erro:***
```shell
$ composer dump-autoload
```

2 - Método antigo

```shell
$ php artisan tinker
	>>> Psy Shell v0.8.1 (PHP 7.0.4 ÔÇö cli) by Justin Hileman
	>>> factory(App\User::class, 10)->create();
	>>> factory(App\Voucher::class, 20)->create();
```

## BrowserSync

Sincroniza o código e as ações de vários navegadores simultaneamente.

### Instalação

1 - [Node.js](https://nodejs.org/en/) => instalação é moleza!!!

```shell
	$ node -v
	>>> v7.5.0
	$ npm -v
	>>> 4.1.2
```

2 - Browsersync é um modulo do Node.js

```shell
	$ npm install -g browser-sync
	$ browser-sync start --open http://127.0.0.1:8000/ --browser firefox --files 'app' 'resources' 'routes' 'database' 'public' '.env'
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).