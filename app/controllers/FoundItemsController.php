<?php

class FoundItemsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$foundItems = FoundItem::all();
		return View::make('foundItems.index')->with(array('foundItems' => $foundItems));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('foundItems.create')->with('foundItems', new FoundItem());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
    	$validator = Validator::make(Input::all(), FoundItem::$rules);
	
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
			$foundItem = new FoundItem();
			$foundItem->title = Input::get('title');
			$foundItem->body = Input::get('body');
			$foundItem->location = Input::get('location');
			$foundItem->email = Input::get('email');
			$foundItem->save();
			Session::flash('successMessage', 'Post created succesfully');
			return Redirect::action('PostsController@index');
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