<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('users')->delete();

	$user = new User();
	$user->first_name = 'steve';
	$user->last_name = 'starnes';
        $user->email = 'admin@vindit.us';
        $user->password = $_ENV['USER1_PASS'];
        $user->is_admin = 1;
        $user->save();

        $user = new User();
		$user->first_name = 'corey';
		$user->last_name = 'kepple';
        $user->email = 'coreyckepple@gmail.com';
        $user->password = $_ENV['USER2_PASS'];
        $user->is_admin = 1;
        $user->save();

        $user = new User();
		$user->first_name = 'cecilia';
		$user->last_name = 'munson';
        $user->email = 'cecimunson@gmail.com';
        $user->password = $_ENV['USER3_PASS'];
        $user->is_admin = 1;
        $user->save();
	}
}