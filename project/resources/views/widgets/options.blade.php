<div class="container options margin-top-20">
         <div class="row-fluid">
            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-8 graphics">
               <div class="background">
                  <!--Bootstrap Nav Bar-->
                  <div role="tabpanel">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{Lang::get('main.trends')}}</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{Lang::get('main.rate')}}</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{Lang::get('main.live')}}</a></li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane active" id="home">
                           <div id="cont" >
                           <script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
                              <!-- TradingView Widget BEGIN -->
                              <script type="text/javascript">
                              new TradingView.widget({
                              "autosize":true,
                              "symbol": "EURUSD",
                              "interval": "D",
                              "timezone": "exchange",
                              "theme": "Grey",
                              "style": "2",
                              "toolbar_bg": "#f1f3f6",
                              "hide_top_toolbar": true,
                              "withdateranges": true,
                              "save_image": false,
                              "hideideas": true
                              });
                              </script>
                              <!-- TradingView Widget END -->


                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">2</div>
                        <div role="tabpanel" class="tab-pane" id="messages">3</div>
                     </div>
                  </div>
                  <!--End-->
               </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 col-lg-4 news">
            <div class="row-fluid">

               <div class="container-fluid">
               <div class="col-md-6 col-xs-6">
               <span style="display:inline-block;font: bold 21px Arial;color:#fff;margin:12px 0px 0 -15px">{{Lang::get('main.news')}}</span>
               </div>
               <div class="col-md-6 col-xs-6">
               <div class="controls-news" style="position: absolute;right: 10px;top:10px">
                                             <img src="/images/arr_up.png" alt=""/>
                                             <img src="/images/arr_down.png" alt=""/>
               </div>
               </div>
               </div>

               <div class="datas">
                <div class="abs">
                @foreach($news as $item)

                <div class="row nw" style="">

                                        <div class=" col-md-3 col-xs-3">
                                          <ul  class="date " >
                                                                  <li>{{($item->created_at->day>=10?$item->created_at->day:'0'.$item->created_at->day).'.'.($item->created_at->month>=10?$item->created_at->month:'0'.$item->created_at->month)}}</li>
                                                                  <li>{{$item->created_at->year}}</li>
                                                              </ul>
                                        </div>

                                   <div class="col-md-9 col-xs-9">
                                   <a style="color:#fff;font-size: 13px" href="{{URL::action('NewsController@index',['category'=>$item->category->slug,'item'=>$item->slug]).'/'}}">
                                   {{trim($item->title_news)}}
                                   </a>
                                   </div>

                </div>
                @endforeach
                </div>

               </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>