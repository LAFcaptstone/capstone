<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/foundItemsDashboard', 'HomeController@showFoundItemsDashboard');

Route::get('/lostItemsDashboard', 'HomeController@showLostItemsDashboard');

Route::get('/usersDashboard', 'HomeController@showUsersDashboard');

Route::get('/messagesDashboard', 'HomeController@showMessagesDashboard');
//user profile
// Route::get('profile/{$id}', 'UserController@showProfile');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::post('/foundItems/{id}/flag', 'FoundItemsController@flag');

Route::post('/lostItems/{id}/flag', 'LostItemsController@flag');

Route::get('/signup', 'UserController@create');

Route::resource('profile', 'UserController');

Route::resource('messages', 'MessagesController');

Route::resource('foundItems', 'FoundItemsController');

Route::resource('lostItems', 'LostItemsController');

Route::get('/map', 'HomeController@showMap');

Route::controller('password', 'RemindersController');

Route::get('/editFoundItem/{id}/{token}', 'FoundItemsController@editWithToken');

// Route::get('/lostItems/{$token}', 'LostItemsController@edit');

Route::get('/test', 'HomeController@showTest');

Route::get('/contact', 'HomeController@showContact');



