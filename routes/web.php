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

Route::get('user/listar', 'UserController@getUsers');
Route::post('user/setAceite','UserController@setAceite');
Route::post('user/setAdmin','UserController@setAdmin');

Route::get('/home', 'HomeController@index')->name('home');

