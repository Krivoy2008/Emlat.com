<?php

class Helper{


    public static  $random_blocks=[

    ];

    public static  function getMenu()
    {
        $action = Route::currentRouteAction();
        $action = explode('@', $action);
        $lang   = App::getLocale();



            $menuItems = [
                'one' => ['one', 'OneController@index', Lang::get('general.one')],
                'two' => ['two', 'TwoController@index', Lang::get('general.two')],
                'three' => ['three', 'ThreeController@index', Lang::get('general.three')],
                'four' => ['four', 'FourController@index', Lang::get('general.four')],
                'five' => ['five', 'FiveController@index', Lang::get('general.five')],
            ];

            $menu = '';

            foreach($menuItems as $item)
            {
                $check = explode('@',$item[1]);
                if($action[0] == $check[0] && $action[1] == $check[1]){
                    $menu .= '<li class="menu-'.$item[0].' menu-parent current-menu-item"><a href="'.action($item[1]).'"><span>'.$item[2].'</span></a></li>';
                }else{
                    $menu .= '<li class="menu-'.$item[0].' menu-parent"><a href="'.action($item[1]).'"><span>'.$item[2].'</span></a></li>';
                }
            }
            Cache::forever('menu-'.$action[0].$action[1].$lang, $menu);
            return Cache::get('menu-'.$action[0].$action[1].$lang);

    }


           public static function randiff($min, $max, $num) {
                if ($min<$max && $max-$min+1 >= $num && $num>0) {
                    static::$random_blocks=[];
                    $i=0;
                    while($i<$num) {
                        $rand_num = rand($min, $max);
                        if (!in_array($rand_num, static::$random_blocks)) {
                            static::$random_blocks[] = $rand_num;
                            $i++;
                        }
                    }

                    return static::$random_blocks;
                } else {
                    return false;
                }
            }
    public static function  getBlocks(){
        App::setLocale('en');
        $urls=\App\Url::all();
        foreach($urls as $url) {
            $blocks = $url->blocks();
            var_dump($blocks);
            $blocks->sync(Helper::randiff(1, 80, 5));
        }
        App::setLocale('ru');
        $urls=\App\Url::all();
        foreach($urls as $url) {
            $blocks = $url->blocks();
            $blocks->sync(Helper::randiff(1, 80, 5));
        }
        App::setLocale('ar');
        $urls=\App\Url::all();
        foreach($urls as $url) {
            $blocks = $url->blocks();
            $blocks->sync(Helper::randiff(1, 80, 5));
        }

    }
    public static function getUnderBlocks(){
        App::setLocale('ar');
        $urls=\App\Url::all();


        foreach($urls as $url){
            $collection=\App\Url::where('curr1','=',$url->curr1)->where('curr2','!=',$url->curr2)->get();
            $not=App\Url::where('curr1','=',$url->curr1)->where('curr2','=',$url->curr2)->first();
            $array=$collection->toArray();
            $seria=Helper::randiff($array[0]['id'], last($array)['id'], 9);
            while(in_array($not->id,$seria)){
                $seria=Helper::randiff($array[0]['id'], last($array)['id'], 9);
            }

            $url->underblocks=serialize($seria);
            $url->save();
            var_dump($url->underblocks);


        }

    }





}
