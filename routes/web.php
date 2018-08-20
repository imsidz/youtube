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

Auth::routes();

Route::get('/', [
	'uses'	=>	'HomeController@welcome'
]);


Route::get('/home', 'HomeController@index')->name('home');

Route::post('search', [
	'uses'	=>	'SearchController@post',
	'as'	=>	'search.post'
]);

Route::get('search/{input}', [
	'uses'	=>	'SearchController@show',
	'as'	=>	'search.show'
]);

Route::post('search/{input}', [
	'uses'	=>	'SearchController@next',
	'as'	=>	'search.next'
]);

Route::get('watch/{videoId}', [
	'uses'	=>	'SearchController@watch',
	'as'	=>	'watch.show'
]);