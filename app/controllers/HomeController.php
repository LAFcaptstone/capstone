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

	// Found items dashboard 
	public function showFoundItemsDashboard()
	{

		if ('flag_count' == 0) {
			$foundItems = FoundItem::orderBy('created_at', 'desc')->paginate(14);
		}
		else {
			$foundItems = FoundItem::orderBy('flag_count', 'desc')->paginate(14);
		}
		return View::make('foundItemsDashboard')->with(array('foundItems' =>$foundItems));
	}

	// Found items dashboard 
	public function showLostItemsDashboard()
	{
		if ('flag_count' == 0) {
			$lostItems = LostItem::orderBy('created_at', 'desc')->paginate(14);
		}
		else {
			$lostItems = LostItem::orderBy('flag_count', 'desc')->paginate(14);
		}
		return View::make('lostItemsDashboard')->with(array('lostItems' =>$lostItems));

	}

	public function showUsersDashboard()
	{
		$users = User::orderBy('created_at', 'desc')->paginate(14);
		
		return View::make('usersDashboard')->with(array('users' =>$users));
	}

	public function showMessagesDashboard()
	{
		$messages = Message::orderBy('created_at', 'desc')->paginate(14);
		
		return View::make('messagesDashboard')->with(array('messages' =>$messages));
		
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
		
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			Session::flash('successMessage', 'Login succesful!');

			if (Auth::user()->is_admin == 1){
				return Redirect::action('HomeController@showFoundItemsDashboard');
			}
			elseif (Auth::user()->is_admin == 2)
			{
				return Redirect::intended('profile/' . Auth::user()->id);
			}
		}
		else {
			Session::flash('errorMessage', 'Login failed, please check your inputs.');
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

	public function searchFoundItems()
	{
		$search = Input::get('search');
		$keywords = explode(' ', $search);
		
		$query = FoundItem::orderBy('created_at', 'desc');
		foreach($keywords as $keyword)
    	{
			$foundItems = $query->where('title', 'LIKE', "%{$keyword}%")
				  			 	->orWhere('body', 'LIKE', "%{$keyword}%")
				      		 	->orWhere('location', 'LIKE', "%{$keyword}%")
				      		 	->paginate(8);
		}
		return View::make('foundItems.index')->with(array('foundItems' => $foundItems));				
	}

	public function searchLostItems()
	{
		$search = Input::get('search');
		$keywords = explode(' ', $search);
		$query = LostItem::orderBy('created_at', 'desc');
		foreach($keywords as $keyword)
    	{
			$lostItems = $query->where('title', 'LIKE', "%{$keyword}%")
				  			 	->orWhere('body', 'LIKE', "%{$keyword}%")
				      		 	->orWhere('location', 'LIKE', "%{$keyword}%")
				      		 	->paginate(8);
		}
		return View::make('lostItems.index')->with(array('lostItems' => $lostItems));
	}

}

