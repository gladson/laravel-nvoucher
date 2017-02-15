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
    return view('index');
});

Route::get('proteger', ['middleware' => ['auth', 'admin'], function() {
    return "Esta pagina requer usuario com regras de admin";
}]);

#Auth::routes();

Route::group(['middleware' => ['web']], function() {
// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('sair', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('registrar', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('registrar', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('senha/refazer', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('senha/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('senha/refazer/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('senha/refazer', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

    Route::get('{id}/editar', 'Auth\EditController@edit') -> name('user_edit');
    Route::put('{id}/atualizar', 'Auth\UpdateController@update') -> name('user_update');

    Route::get('{id}/atualizar/status', 'Auth\AllController@user_update_status') -> name('user_update_status');

    Route::get('usuarios/lista', ['middleware' => ['auth', 'admin'], 'uses' => 'Auth\AllController@list_auth']) -> name('user_list');
});



#Route::resource('voucher', 'Voucher\VoucherController');
Route::get('voucher/lista', 'Voucher\VoucherController@list_voucher') -> name('voucher_list_all');
Route::get('voucher/{id}/atualizar/status', 'Voucher\VoucherController@update_voucher') -> name('update_voucher');
Route::get('voucher/chaves', 'Voucher\VoucherUserController@list_voucher_keys') -> name('voucher_list_keys');

Route::get('voucher/adicionar', 'Voucher\VoucherController@create_voucher') -> name('voucher_list_add');
Route::post('voucher/adicionar', 'Voucher\VoucherController@store_voucher') -> name('voucher_list_add_post');

Route::get('voucher/lista/cupons', 'Voucher\VoucherUserController@create_voucher_keys') -> name('voucher_list_keys_add');
Route::post('voucher/chaves/adicionar', 'Voucher\VoucherUserController@store_voucher_keys') -> name('voucher_list_keys_add_post');

Route::get('/painel-de-controle', 'ControlpanelController@control_panel') -> name('control_panel');