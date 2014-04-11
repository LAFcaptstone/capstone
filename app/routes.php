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

Route::get('/dashboard', 'HomeController@showDashboard');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::post('/foundItems/{id}/flag', 'FoundItemsController@flag');

Route::post('/lostItems/{id}/flag', 'LostItemsController@flag');

Route::get('/signup', 'UserController@create');

Route::post('/signup', 'UserController@store');

Route::resource('users', 'UserController');

Route::resource('foundItems', 'FoundItemsController');

Route::resource('lostItems', 'LostItemsController');

Route::get('/map', 'HomeController@showMap');

Route::controller('password', 'RemindersController');

Route::get('/test', function(){
	return View::make('newhome');
});

