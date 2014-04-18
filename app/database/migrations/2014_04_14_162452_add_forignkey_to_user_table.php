<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForignkeyToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('found_items', function($table)
		{
		    $table->integer('user_id')->unsigned()->nullable();
      	    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');		    
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('found_items', function($table) 
		{
			$table->dropForeign('found_items_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}
}
