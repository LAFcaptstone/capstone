<?php

class FoundItemsController extends BaseController {

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
		$query = FoundItem::orderBy('created_at', 'desc');
		if (is_null($search)) {
			$foundItems = $query->paginate(10);
		} 
		else {
			$foundItems = $query->where('title', 'LIKE', "%{$search}%")
						   		->orWhere('body', 'LIKE', "%{$search}%")
						   		->paginate(10);
		}
		return View::make('foundItems.index')->with(array('foundItems' => $foundItems));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('foundItems.create-edit')->with('foundItems', new FoundItem());
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
			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
				$foundItem->image_path = FoundItem::upload_image($image);
			}
			$foundItem->save();
			Session::flash('successMessage', 'Post created succesfully');
			return Redirect::action('FoundItemsController@index');
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
		$foundItem = FoundItem::findOrFail($id);
		return View::make('foundItems.show')->with('foundItem', $foundItem);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$foundItem = FoundItem::findOrFail($id);
		return View::make('foundItems.create-edit')->with('foundItem', $foundItem);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$foundItem = FoundItem::findOrFail($id);
		// create the validator
    	$validator = Validator::make(Input::all(), FoundItem::$rules);
	
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
			$foundItem->title = Input::get('title');
			$foundItem->body = Input::get('body');
			$foundItem->location = Input::get('location');
			$foundItem->email = Input::get('email');
			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
				$foundItem->image_path = FoundItem::upload_image($image);
			}
			$foundItem->save();
			Session::flash('successMessage', 'Post updated succesfully');
			return Redirect::action('FoundItemsController@show', $foundItem->id);
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
		FoundItem::findOrFail($id)->delete();

		return Redirect::action('FoundItemsController@index');
	}

}