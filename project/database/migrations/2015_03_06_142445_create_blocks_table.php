<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blocks_en', function(Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->timestamps();
        });
        Schema::create('blocks_ru', function(Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->timestamps();
        });
        Schema::create('blocks_ar', function(Blueprint $table) {
            $table->increments('id');
            $table->text('text');
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
		Schema::drop('blocks_en');
		Schema::drop('blocks_ru');
		Schema::drop('blocks_ar');
	}

}
