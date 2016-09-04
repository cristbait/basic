<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('home', 'ContentController@blog');
Route::get('new', 'ContentController@newPost');
Route::post('new', 'PostController@store');
Route::get('edit/{id}', 'ContentController@editPost');
Route::patch('edit/update/{id}','PostController@edit');
Route::any('delete/{id}', 'PostController@destroy');
Route::any('feed', 'ContentController@feed');
Route::any('user/id{id}', 'ContentController@user');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
