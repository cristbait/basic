<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('posts', function($t){
            $t->increments('id');
            $t->string('title', 100);
            $t->text('body');
            $t->string('slug', 200);
            $t->boolean('enabled');
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('posts');
	}

}
