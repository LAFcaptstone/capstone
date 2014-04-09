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

Route::resource('foundItems', 'FoundItemsController');

Route::resource('lostItems', 'LostItemsController');

Route::get('/map', function()
{
		return View::make('map');
});

