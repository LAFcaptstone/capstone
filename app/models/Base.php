<?php

use Carbon\Carbon;

class Base extends Eloquent {

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function getCreatedAtAttribute($value)
	{
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
	}

	public function getUpdatedAtAttribute($value)
	{
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
	}
	 /*
    * Helper to assign images to posts and handle uploads
    */
	public static function upload_image($image)
	{
	
		$destinaion_path = public_path() .'/uploads/';
		$extension = $image->getClientOriginalExtension();
		$filename = uniqid() . '.' . $extension;
		$image->move($destinaion_path, $filename);
		$image_path = '/uploads/' . $filename;
		return $image_path;
		
	}
}