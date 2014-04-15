<?php

class MessagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::orderBy('created_at', 'desc');
		return View::make('messages.index')->with(array('messages' => $messages));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			// create the validator
    	$validator = Validator::make(Input::all(), Message::$rules);
	
    	// attempt validation
    	if ($validator->fails())
    	{
    		Session::flash('errorMessage', 'Post could not be created');

    	    // validation failed, redirect to the post create page with validation errors and old inputs
    	    return Redirect::back()->withInput()->withErrors($validator);
    	}

    	else
    	{
    		// validation succeeded, create and save the post
			$message = new Message();
			if (!is_null(Input::get('email'))) {
				$message->email = Input::get('email');
			}
			$message->title = Input::get('title');
			$message->body = Input::get('body');
			$message->save();
			Session::flash('successMessage', 'Message sent succesfully');
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