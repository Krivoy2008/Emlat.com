<?php namespace App\Http\Controllers;

use App\Currency;
use App\News;
use App\Snippet;
use App\Top_menu;
use App\Url;
use Carbon\Carbon;

class WelcomeController extends Controller {
    public $CURR1;
    public $CURR2;
    public $CURR;
    protected $static_url;
	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

    /**
     * Create a new controller instance.
     *
     * @return \App\Http\Controllers\WelcomeController
     */
	public function __construct()
	{
//		$this->middleware('guest');
        $this->static_url=Url::where('curr1','=','EUR')->where('curr2','=','USD')->first();


	}

    /**
     * Show the application welcome screen to the user.
     *
     * @param Url $url
     * @return Response
     */
	public function index(Url $url)
	{

        if($url->alias){

            $this->CURR1=$url->curr1;
            $this->CURR2=$url->curr2;
            $this->CURR=$this->CURR1.'-'.$this->CURR2;

        }
        else
        {
            $url=$this->static_url;
            $this->CURR1=$this->static_url->curr1;
            $this->CURR2=$this->static_url->curr2;
            $this->CURR=$this->CURR1.'-'.$this->CURR2;
        }
            $underblocks=Url::whereIn('id',unserialize($url->underblocks))->get();
//        dd($underblocks);



		return view('main')->with([
            'snippets'=>Snippet::all(),
            'top_menus'=>Top_menu::all(),
            'news'=> News::all(),
            'metatitle'=>$this->validateData($url->metatitle),
            'metadescription'=>$this->validateData($url->metadescription),
            'metakeywords'=> $this->validateData($url->metakeywords),
            'currencies'=>Currency::all(),
            'blocks'=>$this->validateData($url->blocks),
            'title'=>$this->validateData($url->title),
            'CURR1'=>$this->validateData($url->curr1),
            'CURR2'=>$this->validateData($url->curr2),
            'underblocks'=>$underblocks,
        ]);
	}
    public function validateData($data){

        if(is_array($data) || is_object($data)){
            $datas=[];
            foreach($data as $value){
                $attr=[];
//                dd($value=$value->toArray()['text']);
                foreach($value->toArray() as $attribute) {
                    $attr[] = str_replace(["{TODAY}", "{CURR1}", "{CURR2}", "{CURR}"],
                        [Carbon::now()->format('l jS \\of F Y h:i:s A'), $this->CURR1, $this->CURR2, $this->CURR], $attribute);

                }
                $datas[]=$attr;
            }

        }
        else{

            $datas=str_replace(["{TODAY}","{CURR1}","{CURR2}","{CURR}"],
                [Carbon::now()->format('l jS \\of F Y h:i:s A'),$this->CURR1,$this->CURR2,$this->CURR],$data);
        }

        return $datas;



    }

}
