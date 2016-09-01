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
            $t->integer('user_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->string('title', 100);
            $t->text('body');
            $t->string('slug', 200);
            $t->boolean('enabled')->default(1);
            $t->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $t->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
