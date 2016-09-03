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

Route::get('home', 'HomeController@index');
//Route::get('home', 'ContentController@posts');
//Route::post('home', 'HomeController@index');
Route::get('blog', 'ContentController@posts');
Route::get('new', 'ContentController@newPost');
Route::post('new', 'PostController@store');
Route::get('edit/{id}', [
    'uses'  => 'ContentController@editPost'
]);

Route::patch('edit/update/{id}','PostController@edit');

Route::delete('delete', [
    'uses'  => 'ContentController@deletePost'
]);

Route::resource('post', 'PostController');
// Authentication routes...

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
