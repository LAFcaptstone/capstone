<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostFoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('found_items', function($table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('body', 400);
            $table->string('location', 10);
            $table->string('email', 100);
            $table->string('image_path',200)->unique()->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('found_items');
	}

}
