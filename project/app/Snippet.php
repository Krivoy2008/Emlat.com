<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Snippet extends Model {

	protected $table= 'snippets';

    function __construct()
    {
        $this->lang = \App::getLocale();


    }

    public function getNameAttribute()
    {


        return $this->attributes['Name_'.\App::getLocale()];

    }
    public function getDescriptionAttribute()
    {
        return $this->attributes['Description_'.\App::getLocale()];
    }
}
