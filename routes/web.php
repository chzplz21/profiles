<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('/create', 'PostController@create');
Route::post('/dashboard/editPost/{id}', 'PostController@update');
Route::post('/submitPost', 'PostController@store');
//After editing the post, update
Route::post('/editPost/finishedEdit/{id}', 'PostController@update');





//Editing profile
Route::get('/editProfile', 'EditProfileController@create');
Route::post('/updateProfile', 'EditProfileController@update');

//Shows profile to visitor
Route::get('/user/{id}', 'ProfileVisitorController@index');



//Receives incoming contact message
Route::get('/user/message/{id}', 'ProfileVisitorController@showMessageForm');
Route::post('/messageSent/{id}', 'ProfileVisitorController@messageReceived');
Route::get('/messageSuccess', 'ProfileVisitorController@success')->name('messageSuccess');
Route::get('/myMessages', 'DashboardController@showMessages');


//Search
Route::get('/search', 'Search\SearchRequestController@search');
//Search From Dashboard
Route::get('/dashboard/search', 'PostController@update');


//DummyData
Route::get('/dummyData', 'Dummy\dummyData@index');
Route::get('/dummyUpdate', 'Dummy\dummyUpdate@update');
Route::get('/dummyUpdateLocation', 'Dummy\dummyUpdate@updateLocation');
 









