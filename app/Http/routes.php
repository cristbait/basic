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

Route::get('home', 'ContentController@showBlog');
Route::get('new', 'ContentController@showAddingPost');
Route::get('feed', 'ContentController@showFeed');
Route::get('user/id{id}', ['middleware' => 'own', function()
{
    'home';
}]);
Route::get('edit/{id}', 'ContentController@showEditingPost');

Route::resource('posts', 'ContentController', ['only' => [
    'create', 'update','edit','destroy'
]]);