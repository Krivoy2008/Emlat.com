<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_en',function(Blueprint $table){
            $table->increments('id');
            $table->string('title_news');
            $table->text('body');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->string('title');
            $table->string('img_url');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories_en')
                ->onUpdate('cascade');
            $table->string('slug');
            $table->timestamps();

        });
        Schema::create('news_ru',function(Blueprint $table){
            $table->increments('id');
            $table->string('title_news');
            $table->text('body');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->string('title');
            $table->string('img_url');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories_ru')
                ->onUpdate('cascade');
            $table->string('slug');
            $table->timestamps();

        });
        Schema::create('news_ar',function(Blueprint $table){
            $table->increments('id');
            $table->string('title_news');
            $table->text('body');
            $table->text('metakeywords');
            $table->text('metadescription');
            $table->text('metatitle');
            $table->string('title');
            $table->string('img_url');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories_ar')
                ->onUpdate('cascade');
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
        Schema::drop('news_en');
        Schema::drop('news_ru');
        Schema::drop('news_ar');
    }

}
