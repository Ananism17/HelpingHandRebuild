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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/feed', function () {
    return view('user.profile.feed');
});


Route::get('/user/feed', 'UsersController@index');
Route::get('/user/feed/business', 'UsersController@indexbus');
Route::get('/user/feed/social', 'UsersController@indexsoc');
Route::get('/user/feed/others', 'UsersController@indexoth');

Route::get('/user/profile', 'UsersController@profile');
Route::get('/user/profile/business', 'UsersController@profilebus');
Route::get('/user/profile/social', 'UsersController@profilesoc');
Route::get('/user/profile/others', 'UsersController@profileoth');

Route::get('/user/create', 'UsersController@create');
Route::post('/user/create', 'UsersController@store');

Route::get('/user/edit', 'UsersController@edit');
Route::post('/user/edit', 'UsersController@update');

Route::get('/user/post/delete/{id}', 'UsersController@postDelete');
Route::get('/user/post/delete/yes/{id}', 'UsersController@confirmDelete');


