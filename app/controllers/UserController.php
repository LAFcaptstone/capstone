<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('showWelcome');
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
			$newUser->first_name = Input::get('first name');
			$newUser->last_name = Input::get('last name');
			$newUser->email = Input::get('email');
			$newUser->password = Input::get('password');
			$lostItem->save();
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}