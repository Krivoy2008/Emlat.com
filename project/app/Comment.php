<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Comment
 *
 * @property integer $id_news 
 * @property string $comment_body 
 * @property string $author 
 * @property boolean $validation 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $Email 
 * @property integer $id 
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereIdNews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCommentBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereValidation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 */
class Comment extends Model{

    protected $guarded=[];

    public function __construct()
    {
        parent::__construct();
        $this->table='comments_'.\App::getLocale();
    }

    public function article(){
        return $this->hasOne('App/News','id_news');
    }

    public static function addComment($news,$request){
     $comment= new Comment();
     $comment->comment_body=$request->comment_body;
     $comment->author=$request->author;
     $comment->email=$request->email;
     $comment->validation=0;
     $comment->id_news=$news->id;
     $comment->save();
    }
    public static function  getComments($news){

    return DB::table('comments')->where('id_news',$news->id)->where('validation',1)->get();
    }

}
