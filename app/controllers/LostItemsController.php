<?php

class LostItemsController extends BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();
	
	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//show lists of all posts
		$search = Input::get('search');
		$query = LostItem::orderBy('created_at', 'desc');
		if (is_null($search)) {
			$lostItems = $query->paginate(10);
		} 
		else {
			$lostItems = $query->where('title', 'LIKE', "%{$search}%")
						   	   ->orWhere('body', 'LIKE', "%{$search}%")
						   	   ->paginate(10);
		}
		return View::make('lostItems.index')->with(array('lostItems' => $lostItems));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('lostItems.create-edit')->with('lostItems', new LostItem());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
    	$validator = Validator::make(Input::all(), LostItem::$rules);
	
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
			$lostItem = new LostItem();
			$lostItem->title = Input::get('title');
			$lostItem->body = Input::get('body');
			$lostItem->location = Input::get('location');
			$lostItem->email = Input::get('email');
			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
				$lostItem->image_path = LostItem::upload_image($image);
			}
			$lostItem->save();
			Session::flash('successMessage', 'Post created succesfully');
			return Redirect::action('LostItemsController@index');
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
		$lostItem = LostItem::findOrFail($id);
		return View::make('lostitems.show')->with('lostItem', $lostItem);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lostItem = LostItem::findOrFail($id);
		return View::make('lostitems.create-edit')->with('lostItem', $lostItem);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$lostItem = LostItem::findOrFail($id);
		// create the validator
    	$validator = Validator::make(Input::all(), LostItem::$rules);
	
    	// attempt validation
    	if ($validator->fails())
    	{
			Session::flash('errorMessage', 'Post could not be updated');
    	    // validation failed, redirect to the post create page with validation errors and old inputs
    	    return Redirect::back()->withInput()->withErrors($validator);
    	}

    	else
    	{
    		// validation succeeded, create and save the post
			$lostItem->title = Input::get('title');
			$lostItem->body = Input::get('body');
			$lostItem->location = Input::get('location');
			$lostItem->email = Input::get('email');
			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
				$lostItem->image_path = LostItem::upload_image($image);
			}
			$lostItem->save();
			Session::flash('successMessage', 'Post updated succesfully');
			return Redirect::action('LostItemsController@show', $lostItem->id);
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
		LostItem::findOrFail($id)->delete();

		return Redirect::action('LostItemsController@index');
	}

	public function flag($id)
	{
		$lostItem = LostItem::findOrFail($id);
		$lostItem->flag_count ++;
		$lostItem->save();
		Session::flash('successMessage', 'Post flagged succesfully');
		return Redirect::action('LostItemsController@show', $lostItem->id);
	}

}