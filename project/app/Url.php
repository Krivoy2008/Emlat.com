<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Url extends Model {

    protected $guarded=[];


    public function __construct()
    {
        parent::__construct();
        $this->table='urls_'.\App::getLocale();
    }



    public function blocks(){
        return $this->belongsToMany('App\Block','block_url_'.\App::getLocale());
    }
    public static function getList()
    {
        return static::lists('alias', 'id');
    }
    public function setBlocksAttribute($blocks)
    {
        $this->blocks()->detach();
        if ( ! $blocks) return;
        if ( ! $this->exists) $this->save();
        $this->blocks()->attach($blocks);
    }

}
