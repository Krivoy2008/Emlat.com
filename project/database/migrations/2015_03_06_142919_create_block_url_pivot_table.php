<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockUrlPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('block_url_en', function(Blueprint $table)
		{
			$table->integer('block_id')->unsigned()->index();
			$table->foreign('block_id')->references('id')->on('blocks_en')->onDelete('cascade');
			$table->integer('url_id')->unsigned()->index();
			$table->foreign('url_id')->references('id')->on('urls_en')->onDelete('cascade');
		});
        Schema::create('block_url_ru', function(Blueprint $table)
        {
            $table->integer('block_id')->unsigned()->index();
            $table->foreign('block_id')->references('id')->on('blocks_ru')->onDelete('cascade');
            $table->integer('url_id')->unsigned()->index();
            $table->foreign('url_id')->references('id')->on('urls_ru')->onDelete('cascade');
        });
        Schema::create('block_url_ar', function(Blueprint $table)
        {
            $table->integer('block_id')->unsigned()->index();
            $table->foreign('block_id')->references('id')->on('blocks_ar')->onDelete('cascade');
            $table->integer('url_id')->unsigned()->index();
            $table->foreign('url_id')->references('id')->on('urls_ar')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('block_url_en');
		Schema::drop('block_url_ru');
		Schema::drop('block_url_ar');
	}

}
