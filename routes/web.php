<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Auth::routes();

Route::group(['middleware' => ['web']], function() {
// Login Routes...
    Route::get('usuario/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('usuario/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('usuario/sair', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('usuario/registrar', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('usuario/registrar', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('usuario/senha/refazer', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('usuario/senha/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('usuario/senha/refazer/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('usuario/senha/refazer', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('usuario/{id}/editar', 'Auth\EditController@edit') -> name('user_edit');
Route::put('usuario/{id}/atualizar', 'Auth\UpdateController@update') -> name('user_update');

Route::resource('voucher', 'Voucher\VoucherController');

Route::get('/painel-de-controle', 'PaineldecontroleController@paineldecontrole') -> name('painel_de_controle');

