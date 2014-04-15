<?php

class FoundItemsController extends BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();
	
	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index', 'show', 'create', 'store', 'flag')));
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
			$keywords = explode(' ', $search);
			foreach($keywords as $keyword)
    		{
				$foundItems = $query->where('title', 'LIKE', "%{$keyword}%")
						   			->orWhere('body', 'LIKE', "%{$keyword}%")
						   			->orWhere('location', 'LIKE', "%{$keyword}%")
						   			->paginate(10);
			}
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
			$foundItem->token = uniqid('', true);

			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
				$foundItem->image_path = FoundItem::upload_image($image);
			}
			$foundItem->save();

			Mail::send('emails.auth.foundItemsLink', array('token' => $foundItem->token, 'id' => $foundItem->id, 'email'=>Input::get('email')), function($message){
        		$message->to(Input::get('email'))->subject('VIND.IT: Edit/Delete your Post');
    		});

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
		// check if admin, owner or token
		if (Auth::check() || $foundItem->token == Input::get('token')) {
			return View::make('foundItems.create-edit')->with('foundItem', $foundItem);
		}

		App::abort('404');
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

	public function flag($id)
	{
		$foundItem = FoundItem::findOrFail($id);
		$foundItem->flag_count ++;
		$foundItem->save();
		Session::flash('successMessage', 'Post flagged succesfully');
		return Redirect::action('FoundItemsController@show', $foundItem->id);
	}

	public function canManage()
	{
		return $this->id == $founditem->user_id;
	}

}