<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use LaravelLocalization;

use Symfony\Component\HttpFoundation\File\UploadedFile;


class News extends Model{




    public function __construct()
    {
        parent::__construct();
        $this->table='news_'.\App::getLocale();
    }

    protected $guarded = [];

    public function getImageFields()
    {
        //dd( \DB::table('news')->lists('img_url'));
        return [
                'img_url' => 'news/'
        ];
    }
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment','id_news')->where('validation',1);
    }
	public function setImage($field, $image)
	{
		parent::setImage($field, $image);
		$file = $this->$field;
		if ( ! $file->exists()) return;
		
    $path = $file->getFullPath();
	}


	public function getImageAttribute(){
		return '/images/news/'.$this->attributes['img_url'];
	
	}
    public static function getNewsByCategory($category_id){

    return News::where('category_id','=',$category_id->id)->paginate(10);

    }
    public static function getList(){
        return static::lists('title_news','id');
    }



}
