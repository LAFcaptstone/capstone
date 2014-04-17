<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Base implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	const ROLE_ADMIN = 1;
	const ROLE_USER = 2;

	public static $ROLES = array(
		array('id' => 1, 'name' => 'Administrator'),
		array('id' => 2, 'name' => 'Stadnard User')
	);


	public static $rules = array(
    	'first_name'      => 'required|max:50',
    	'last_name'       => 'required|max:50',
    	'email'		 => 'required|unique:users|max:50|email',
    	'password'   => 'required|max:10',
	
	);
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public function setPasswordAttribute($pass)
	{
		$this->attributes['password'] = Hash::make($pass);
	}

	/** relationship for has many posts */
	public function posts()
	{
		return $this->hasMany('Post');
	}

	// $user_posts = User::find(1)
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}
	/* determine if user is admin */
	public function isAdmin()
	{
		return $this->role_id == self::ROLE_ADMIN;
	}
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	

}