<?php

class FoundItem extends Base {

    protected $table = 'found_items';
      /**
      * Validation Rules
      */ 
    public static $rules = array(
    'title'      => 'required|max:30',
    'body'       => 'required|max:350',
    'email'		 => 'required|max:100',
    'location'   => 'required|max:10'
	
	);

}