<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.show');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
			// $newUser->user_id = Auth::user()->id;
			$newUser->first_name = Input::get('first_name');
			$newUser->last_name = Input::get('last_name');
			$newUser->email = Input::get('email');
			$newUser->password = Input::get('password');
			$newUser->save();
			Session::flash('successMessage', 'Welcome!');
			return Redirect::action('HomeController@showWelcome');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$newUser = User::findOrFail($id);
		return View::make('users.show')->with('user', $newUser);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$newUser = User::findOrFail($id);
		return View::make('users.edit')->with('user', $newUser);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
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
			$newUser->first_name = Input::get('first_name');
			$newUser->last_name = Input::get('last_name');
			$newUser->email = Input::get('email');
			$newUser->password = Input::get('password');
			$lostItem->save();

			Mail::send('users.mails.welcome', array('first_name'=>Input::get('first_name')), function($message){
        		$message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Welcome to VIND.IT!');
    		});
    		
			Session::flash('successMessage', 'Welcome!');
			return Redirect::action('HomeController@showWelcome');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
    		Session::flash('successMessage', 'Post Deleted successfully');
    	    

			return Redirect::action('HomeController@showWelcome');
	}

}