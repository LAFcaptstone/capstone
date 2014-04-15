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
//admin dashboard
Route::get('/dashboard', 'HomeController@showDashboard');
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

Route::get('/foundItems/{$id}?token={$token}/edit', 'FoundItemsController@edit');
// 
// Route::get('/lostItems/{$token}', 'LostItemsController@edit');

Route::get('/test', 'HomeController@showTest');

Route::get('/contact', 'HomeController@showContact');



