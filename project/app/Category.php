<?php namespace App;

use Illuminate\Database\Eloquent\Model;



class Category extends Model {


    protected $guarded=[];
    public function __construct()
    {
        parent::__construct();
        $this->table='categories_'.\App::getLocale();
    }

    public function news()
    {
        return $this->hasMany('\App\News','category_id');

    }
    public static function getList(){

       return static::lists('name','id');
    }

}
