<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Block extends Model {
    protected $guarded=[];



    public function __construct()
    {
        parent::__construct();
        $this->table='blocks_'.\App::getLocale();
    }

    public function urls(){
        return $this->belongsToMany('\App\Url','block_url_'.\App::getLocale());
    }
    public static  function getList(){
//        dd(static::lists('text','block_url.id'));
        return static::lists('id','id');

    }



}
