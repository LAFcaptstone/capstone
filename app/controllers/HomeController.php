<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	// home view route
	public function showWelcome()
	{
		$data = Input::all();

		return View::make('home')->with('data', $data);
	}

	public function showMap()
	{
		$foundItems = FoundItem::all();
		return View::make('map')->with(array('foundItems' => $foundItems));
	}


}