<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Top_menu
 *
 * @property string $Name_ru 
 * @property string $Name_en 
 * @property string $Name_ar 
 * @property-read mixed $name 
 * @method static \Illuminate\Database\Query\Builder|\App\Top_menu whereNameRu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Top_menu whereNameEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Top_menu whereNameAr($value)
 */
class Top_menu extends Model {
    protected $table='top_menus';
    protected $guarded=[];


    public function getNameAttribute()
    {


        return $this->attributes['Name_'.\App::getLocale()];

    }

}
