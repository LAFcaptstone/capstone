<?php

class Message extends Base {

    protected $table = 'messages';

     public static $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:2000',
	
	);
   

}