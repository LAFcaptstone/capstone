<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('users')->delete();

		$user = new User();
		$user->first_name = 'steve';
		$user->last_name = 'starnes';
        $user->email = 'admin@vindit.us';
        $user->password = 'Vindit1234!';
        $user->save();
	}
}