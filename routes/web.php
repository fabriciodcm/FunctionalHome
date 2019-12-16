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

Route::group(array('prefix' => 'api','middleware' => 'auth:api'),function(){
    
});
Route::post('user/login', 'UserController@login');
Route::get('user/login', 'UserController@login');

Auth::routes();

Route::get('user/listar', 'UserController@getUsers')->name('user_listar');
Route::post('user/setAceite','UserController@setAceite');
Route::post('user/setAdmin','UserController@setAdmin');
Route::get('user/edit/{id}', 'Auth\RegisterController@getUser');
Route::post('user/edit', 'Auth\RegisterController@edit');
Route::get('user/delete/{id}', 'UserController@delete');

Route::get('comodo/listar', 'ComodoController@getComodos');
Route::get('comodo/cadastro', 'ComodoController@cadComodo');
Route::get('comodo/edit/{id}', 'ComodoController@getComodo');
Route::post('comodo/insert', 'ComodoController@insert');
Route::get('comodo/delete/{id}', 'ComodoController@delete');

Route::get('eletrodomestico/listar', 'EletrodomesticoController@getEletrodomesticos');
Route::get('eletrodomestico/cadastro', 'EletrodomesticoController@cadEletrodomestico');
Route::get('eletrodomestico/edit/{id}', 'EletrodomesticoController@getEletrodomestico');
Route::post('eletrodomestico/insert', 'EletrodomesticoController@insert');
Route::get('eletrodomestico/delete/{id}', 'EletrodomesticoController@delete');
Route::post('eletrodomestico/ligaDesliga','EletrodomesticoController@ligaDesliga');

Route::get('lampada/listar', 'LampadaController@getLampadas');
Route::get('lampada/cadastro', 'LampadaController@cadLampada');
Route::get('lampada/edit/{id}', 'LampadaController@getLampada');
Route::post('lampada/insert', 'LampadaController@insert');
Route::get('lampada/delete/{id}', 'LampadaController@delete');
Route::post('lampada/ligaDesliga','LampadaController@ligaDesliga');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('home/ligaDesliga','HomeController@ligaDesliga');

