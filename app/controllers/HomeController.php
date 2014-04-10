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

	public function showSignup ()
	{
		return View::make('signup');
	}

	public function doSignup ()
	{
			// create the validator
			$validator = Validator::make(Input::all(), User::$rules);

			// attempt validation
    		if ($validator->fails())
    		{
    		Session::flash('errorMessage', 'Please Sign In.');

    	    // validation failed, redirect to the post create page with validation errors and old inputs
    	    return Redirect::back()->withInput()->withErrors($validator);
    		}
			else
			{	
				$newUser = new User();
				$newUser->first_name = Input::get('first name');
				$newUser->last_name = Input::get('last name');
				$newUser->email = Input::get('email');
				$newUser->password = Input::get('password');
				$lostItem->save();
				Session::flash('successMessage', 'Welcome!');
				return Redirect::action('HomeController@showWelcome');
			}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::action('HomeController@showWelcome');
	}


}