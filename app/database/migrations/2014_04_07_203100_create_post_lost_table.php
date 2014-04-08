<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lost_items', function($table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('body');
            $table->string('location', 10);
            $table->string('email', 100);
            $table->string('image_path',200)->unique()->nullable();
            $table->string('reward', 200)->nullable();
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
		Schema::drop('lost_items');
	}

}
