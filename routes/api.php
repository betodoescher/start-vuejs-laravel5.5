<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
  
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});

Route::get('translations/{locale}', 'TranslationController@show');

Route::group(['middleware' => 'jwt'], function () {
    // Protected routes

    Route::get('relatorio', 'RelatorioController@indexRelatorio');
 });
Route::get('protocolo/{id}', 'ProtocoloController@show');
Route::get('protocolo/formulario/{id}', 'ProtocoloController@showFormulario');
Route::resource('formulario', 'FormularioController');
Route::resource('usuario', 'UserController');
Route::resource('atendimento', 'AtendimentoController');
// Unidade
Route::get('unidade', 'UnidadeController@index');
