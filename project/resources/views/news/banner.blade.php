<div id="news_anchor" class="container margin-top-20" >
    <div class="bgnews">
        <div class="row">
         <div class="little_block col-sm-4 col-xs-12">
             <ul id="little_news" >
             @foreach($articles_in_table as $article)
             <li>
                                  <div class="row">
                                      <div class="col-sm-3 col-xs-3">
                                          <ul  class="date ">
                                              <li>{{($article->created_at->day>=10?$article->created_at->day:'0'.$article->created_at->day).'.'.($article->created_at->month>=10?$article->created_at->month:'0'.$article->created_at->month)}}</li>
                                              <li>{{$article->created_at->year}}</li>
                                          </ul>
                                      </div>
                                      <div class="col-sm-9 col-xs-9">
                                          <a href="{{URL::action('NewsController@index',['category'=>$article->category->slug,'item'=>$article->slug]).'/'}}">{{$article->title_news}}</a>
                                      </div>
                                  </div>
                                  <img src="{{$article->image}}" alt="" class=" hidden-xs" style="visibility: hidden"/>
                              </li>
                              <img class="img-responsive mobile_image " style="display: none"  src="{{$article->image}}" alt="" />
             @endforeach


             </ul>

         </div>
        <div class="col-sm-8 col-md-8 hidden-xs" style="padding-left: 0">
            <img class="img-responsive" id="news_image" src="{{$article->image}}" alt="{{$article->title_news}}" />
        </div>
        </div>
    </div>
</div>