<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('urls_en', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('curr1');
            $table->string('curr2');
            $table->string('title');
            $table->string('metatitle');
            $table->string('metadescription');
            $table->string('metakeywords');
            $table->timestamps();
        });
        Schema::create('urls_ru', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('curr1');
            $table->string('curr2');
            $table->string('title');
            $table->string('metatitle');
            $table->string('metadescription');
            $table->string('metakeywords');
            $table->timestamps();
        });
        Schema::create('urls_ar', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('curr1');
            $table->string('curr2');
            $table->string('title');
            $table->string('metatitle');
            $table->string('metadescription');
            $table->string('metakeywords');
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
		Schema::drop('urls_en');
		Schema::drop('urls_ru');
		Schema::drop('urls_ar');
        
	}

}
