<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments_en',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_news');
            $table->text('comment_body');
            $table->string('author');
            $table->boolean('validation');
            $table->timestamps();
        });
        Schema::create('comments_ru',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_news');
            $table->text('comment_body');
            $table->string('author');
            $table->boolean('validation');
            $table->timestamps();
        });
        Schema::create('comments_ar',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_news');
            $table->text('comment_body');
            $table->string('author');
            $table->boolean('validation');
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
		Schema::drop('comments_en');
		Schema::drop('comments_ru');
		Schema::drop('comments_ar');
	}

}
