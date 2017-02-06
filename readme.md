<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Voucher

## Voucher

***Caso tenha duvidas em instalar o php, composer, laravel, no windows [PHP-COMPOSER-LARAVEL](https://gist.github.com/gladson/bfd863cb88d66f84b2fde8929265553a#file-composer_laravel-md)***

### Instalação

```shell
$ git clone https://github.com/gladson/laravel-nvoucher.git
$ cd laravel-nvoucher
$ composer install
or
$ composer update
```

## Gerar Usuarios Fakes:

```shell
$ php artisan tinker
	>>> Psy Shell v0.8.1 (PHP 7.0.4 ÔÇö cli) by Justin Hileman
	>>> factory(App\User::class, 10)->create();
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
