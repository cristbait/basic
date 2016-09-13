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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//content control
Route::get('home', 'ContentController@blog');
Route::get('new', 'ContentController@newPost');
Route::get('feed', 'ContentController@feed');
Route::get('user/id{id}', 'ContentController@user');
Route::get('edit/{id}', 'ContentController@editPost');

//actions with posts
Route::post('new', 'PostController@store');
Route::patch('edit/update/{id}','PostController@edit');
Route::any('delete/{id}', 'PostController@destroy');


// В Laravel есть замечательный Route:resource, настоятельно рекомендую пользоваться

