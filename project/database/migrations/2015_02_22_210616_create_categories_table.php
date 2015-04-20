<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('categories_en',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->text('title');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('categories_ru',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->text('title');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('categories_ar',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->text('title');
            $table->string('slug');
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
		Schema::drop('categories_en');
		Schema::drop('categories_ru');
		Schema::drop('categories_ar');
	}

}
