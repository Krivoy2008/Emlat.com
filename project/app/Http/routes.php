<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;

//Event::listen('illuminate.query', function($query)
//{
//
//    var_dump($query);
//});

Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localizationRedirect']
], function()
{
    Route::group(['prefix'=>'api'],function(){
        Route::get('/',function(){
            return new CurrencyResponse();
        });

        Route::get('js/','ApiController@returnJS');
        Route::get('css/','ApiController@returnCSS');
        Route::get('jsloc/','ApiController@returnJSLoc');
    });
    Route::bind('category',function($slug){
	
	   return App\Category::where('slug',$slug)->first();
	
    });
    Route::bind('item',function($slug){

        return App\News::where('slug',$slug)->first();
    });
    Route::get('faq','FAQController@index');
    Route::get('contacts','ContactsController@index');
    Route::post('news/{item}/add_comment',['as'=>'comment','uses'=>'NewsController@addComment']);
    Route::post('contacts/sendMail','ContactsController@sendMail');
    Route::get('fordevelopers','DeveloperController@index');
    Route::get('news/{category}','NewsController@getNewsPageByCategory');
    Route::get('news',['as'=>'news','uses'=>'NewsController@getNewsPage']);
    Route::get('news/{category}/{item}','NewsController@index');
    Route::get('/','WelcomeController@index');
    Route::get('/{url?}','WelcomeController@index')->where('url', '(.*)[A-Z]{3}-[A-Z]{3}');;
    Route::bind('url',function($url){
         $data= \App\Url::where('alias','=',$url)->where('published','=','1')->first();
       if(is_null($data))
           App::abort(404);
        return $data;
    });
    //Route::get('{url}',['as'=>'converter','uses'=>'WelcomeController@index']);




    Route::get('fuck',function(){
//        $string = file_get_contents("currencies.json");
//        $json_a = json_decode($string, true);
//        dd(count($json_a));
//        foreach($json_a as $currency){
//            \App\Currency::create([
//                "shortname"=>$currency['shortname'],
//                "longname"=>$currency['longname'],
//                "users"=>$currency['users'],
//                "alternatives"=>$currency['alternatives'],
//                "symbol"=>$currency['symbol'],
//                ]);
//        }






//        if (($handle = fopen("Blocks-2.csv", "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//
//            foreach($data as $block){
//                \App\Block::create([
//                    "text"=>$block
//                ]);
//            }
//            }
//            fclose($handle);
//        }



        




//        http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json
    });

    Route::get('home', 'HomeController@index');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);








});




Route::get('converter/',function(){
   return view('api')->with('snippets',\App\Snippet::all());
});



