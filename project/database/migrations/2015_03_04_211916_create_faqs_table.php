<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('faqs_en',function(Blueprint $table){
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
            $table->timestamps();
        });
        Schema::create('faqs_ru',function(Blueprint $table){
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
            $table->timestamps();
        });
        Schema::create('faqs_ar',function(Blueprint $table){
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
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
		Schema::drop('faqs_en');
        Schema::drop('faqs_ar');
        Schema::drop('faqs_ru');
	}

}
