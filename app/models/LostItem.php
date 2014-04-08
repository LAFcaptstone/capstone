<?php

class LostItem extends Base {

    protected $table = 'lost_items';

     /**
    * Validation Rules
    */ 
    public static $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:2000',
    'email'		 => 'required|max:100',
    'location'   => 'required|max:10',
	
	);

}