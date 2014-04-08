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
	public function uploadImage()
	{
		$file = Input::file('file'); // your file upload input field in the form should be named 'file'

		$destinationPath = 'uploads/img';
		$filename = $file->getClientOriginalName();
		$uploadSuccess = Input::file('file')->move($destinationPath, $filename);
		 
		if( $uploadSuccess ) {
		   Session::flash('successMessage', 'Image uploaded successfully');
	        return Redirect::back()->withInput();
		} else {
		   Session::flash('errorMessage', 'Image could not be uploaded.');
	        return Redirect::back()->withInput()->withErrors($validator);
		}
	}
}