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

	public function __construct()
	{
	    // require auth check to access dashboard page
	    $this->beforeFilter('auth', array('only' => 'showDashboard'));
	}
	// home view route
	public function showWelcome()
	{
		$data = Input::all();

		return View::make('home')->with('data', $data);
	}

	// admin dashboard route
	public function showDashboard()
	{
		$foundItems = FoundItem::all();
		return View::make('dashboard')->with(array('foundItems' => $foundItems));
	}

	public function showMap()
	{
		$foundItems = FoundItem::all();
		return View::make('map')->with(array('foundItems' => $foundItems));
	}


	public function showLogin ()
	{
		return View::make('login');
	}

	public function doLogin ()
	{
		// var_dump(Input::all());
		// die();
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
			{
			    return Redirect::intended('/');
			}
			else
			{
				Session::flash('errorMessage', 'NO!');
			    return Redirect::back()->withInput();
			}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::action('HomeController@showWelcome');
	}


}