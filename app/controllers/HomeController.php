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
	    //$this->beforeFilter('auth', array('only' => 'showDashboard'));
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
		
		$foundItems = FoundItem::orderBy('flag_count', 'desc')->get();;
		$lostItems = LostItem::orderBy('flag_count', 'desc')->get();;
		$data = array(
			'foundItems' => $foundItems,
			'lostItems' => $lostItems
		);
		return View::make('dashboard')->with($data);
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
				if (Auth::user(1)){
			    return Redirect::action('HomeController@showDashboard');
		
				} 
				elseif (Auth::user(2)){
				return View::make('profile');
				}
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

	public function showTest()
	{
		return View::make('newhome');
	}

	public function showContact()
	{
		return View::make('contact');
	}


}