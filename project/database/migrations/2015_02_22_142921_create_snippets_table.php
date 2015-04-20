<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('snippets', function(Blueprint $table)
        {
            $table->string('Name_ar');
            $table->string('Name_ru');
            $table->string('Name_en');
            $table->string('Description_ar');
            $table->string('Description_ru');
            $table->string('Description_en');
            $table->string('img_url');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('snippets');
	}

}
