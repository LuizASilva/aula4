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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/herois', 'HeroiController@index');
Route::view('/herois/novo', 'herois.create');
Route::get('/herois/detalhe/{id}', 'HeroiController@detalhe');
Route::get('/herois/update', 'HeroiController@update');

Route::delete('/herois', 'HeroiController@delete');
