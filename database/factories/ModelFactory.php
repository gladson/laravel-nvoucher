<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*
Operador Ternario => ?:
*/

use Faker\Factory as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function ($faker) {
    $faker = Faker::create('pt_BR');

    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => mt_rand(0,1),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Voucher::class, function ($faker) {
	$faker = Faker::create('pt_BR');
	
	$chave_gerada = substr(md5(uniqid(mt_rand(1,3)+mt_rand(1,3))), 0, 10);

	$chave_todos = App\Voucher::all();
	#$chave_filtro = $chave_todos->filter(function($item, $chave_gerada) {
	#    return $item->chave == $chave_gerada;
	    //echo "{$item->chave}<==>";
	    //echo $chave_gerada;
	#})->first();

	#$chave_check = App\Voucher::where('chave', $chave_gerada)->first();
	#$chave_check = App\Voucher::where('chave')->first();

	$chave_check = App\Voucher::where('chave', '=', $chave_gerada)->get();
	echo "{$chave_check->first()}<==>";
    if(!$chave_check){
        $exists = false;
        echo "False";
        $chave_gerada = substr(md5(uniqid(mt_rand(1,4)+mt_rand(1,4)+mt_rand(1,4)+mt_rand(1,4))), 0, 10);
    } else {
    	$exists = true;
    	echo "True";
    	#$chave_gerada = substr(md5(uniqid(mt_rand(1,6)+mt_rand(1,2)+mt_rand(1,3)+mt_rand(1,6)+mt_rand(1,2)+mt_rand(1,3))), 0, 10);
    }

    #echo "{$chave_gerada}<==>";

	return [
		'chave' => $chave_gerada,
        'desconto_valor' => mt_rand(10, 65),
        'desconto_tipo' => mt_rand(0,1),
        'desconto_descricao' => $faker->text($maxNbChars = 200),
        #'user_id' => $faker->numberBetween($min = 1, $max = 100),
        #'user_id' => 'factory:App\User',
    	#O argumento 'user_id' esta no database/seeder                                             
		'status' => mt_rand(0,1),
        'data_inicio' => $faker->date($format = 'Y-m-d'),
        'data_fim' => $faker->date($format = 'Y-m-d')
	];

});