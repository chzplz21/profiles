<?php

use Illuminate\Support\Facades\Log;





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

Route::get('/', 'frontController@index');


//All authentication routes
Auth::routes();

//Front of dashboard
Route::get('/dashboard', 'DashboardController@index');


Route::get('/create', 'PostController@create');
Route::post('/dashboard/editPost/{id}', 'PostController@update');
Route::post('/submitPost', 'PostController@store');
//After editing the post, update
Route::post('/editPost/finishedEdit/{id}', 'PostController@update');
//Delete Post
Route::get('/deletePost/{id}', 'PostController@destroy');
Route::get('/greatJob', 'PostController@success')->name('greatJob');

//Editing profile
Route::get('/editProfile', 'EditProfileController@create');
Route::post('/updateProfile', 'EditProfileController@store');

//Shows profile to visitor
Route::get('/user/{id}', 'ProfileVisitorController@index');
//Message a user
Route::get('/user/message/{id}', 'ProfileVisitorController@showMessageForm');
//Receives incoming contact message
Route::post('/messageSent/{id}', 'ProfileVisitorController@messageReceived');
Route::get('/messageSuccess', 'ProfileVisitorController@success')->name('messageSuccess');









