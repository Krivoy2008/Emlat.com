<div class="container  margin-top-20">
         <div class="row-fluid">
         <div id="maxblock">
            <div class="blackground">
            <h3 style="font-family: 'Fregat';padding-left: 20px;">{{Lang::get('main.currency_exchange')}}</h3>
               <div class="textblock">
               @foreach($blocks as $block)
                              <p>
                              {!!$block[1]!!}
                             </p><br>
               @endforeach
               </div>
               <div class="">
                                       <div  style="padding:20px">
                                       <h3 style="font-family: 'Fregat';margin: 0">{{Lang::get('main.related_currencies')}}</h3>
                                       <div class="row" style="text-align: center">

                                       @foreach($underblocks as $underblock)
                                        <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top: 10px">
                                           <a style="font-family:'Fregat';color: #fff;font-weight: bold;font-size: 15px" href="{{URL::to('/').'/'.$underblock->alias.'/'}}">{{$underblock->curr1.'-'.$underblock->curr2}}</a>
                                        </div>
                                         @endforeach
                                         </div>
                                         </div>
                                         </div>
            </div>

            </div>

         </div>
      </div>