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

//Feed routes

Route::get('/user/feed', 'UsersController@index');
Route::get('/user/feed/business', 'UsersController@indexbus');
Route::get('/user/feed/social', 'UsersController@indexsoc');
Route::get('/user/feed/others', 'UsersController@indexoth');

//Profile routes

Route::get('/user/profile', 'UsersController@profile');
Route::get('/user/profile/business', 'UsersController@profilebus');
Route::get('/user/profile/social', 'UsersController@profilesoc');
Route::get('/user/profile/others', 'UsersController@profileoth');

Route::get('/guest/profile/{id}', 'UsersController@guestProfile');


Route::get('/user/edit', 'UsersController@edit');
Route::post('/user/edit', 'UsersController@update');



//Post Routes

Route::get('/user/post/create', 'UsersController@create');
Route::post('/user/post/create', 'UsersController@store');

Route::get('/user/post/delete/{id}', 'UsersController@postDelete');
Route::get('/user/post/delete/yes/{id}', 'UsersController@confirmDelete');

Route::get('/user/post/donate/{id}', 'UsersController@donate');
Route::post('/user/post/donate/{id}', 'UsersController@donateStore');


