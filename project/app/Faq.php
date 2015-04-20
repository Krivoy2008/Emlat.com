<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Faq extends Model {


    protected $guarded=[];
    public function __construct()
    {
        parent::__construct();
        $this->table='faqs_'.\App::getLocale();
    }



}
