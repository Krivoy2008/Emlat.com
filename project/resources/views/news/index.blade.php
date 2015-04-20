@extends('html')

@section('content')
@include('widgets.breadcrumps')
@include('widgets.title')
<div class="container mob">
<select onchange="location = this.options[this.selectedIndex].value;" class="mobile_category">
                                                        @foreach($categories as $category)
                                                            <option @if(isset($active_category) && $active_category->id==$category->id)selected="selected"@endif value="{{URL::action('NewsController@getNewsPageByCategory',['category'=>$category->slug]).'/'.'#news_anchor'}}">

                                                                    {{{ $category->name}}}

                                                            </option>
                                                        @endforeach
                                                    </select>
</div>		

<div class="container margin-top-20" >
    <div class="blnews newsindex  col-md-9 ">

        <div class="itemIndex">
            <div class=" col-md-6 col-xs-6" style="padding-left: 0!important;">{{Lang::get('news.posted')}} Admin {{$article->created_at}}</div>
            <div class=" col-md-6 col-xs-6 " style="text-align: right">
        <span class="glyphicon glyphicon-comment" style="color:#bebebe;margin:0 3px 0 0;padding-top: 2px" aria-hidden="true">
        </span>{{$article->comments->count()}} {{Lang::get('news.comments')}}
            </div>
            <div class="clearfix"></div>
            <div class="hrgrey">
                <hr/>
            </div>


            <img  class="article_img col-xs-12" src="{{$article->image}}" alt=""/>
            <div class="clearfix visible-xs"></div>
            <div class=" col-lg-6 col-md-6 col-sm-6 no-padding">
                <ul  class="date hidden-xs ">
                    <li>{{($article->created_at->day>=10?$article->created_at->day:'0'.$article->created_at->day).'.'.($article->created_at->month>=10?$article->created_at->month:'0'.$article->created_at->month)}}</li>
                    <li>{{$article->created_at->year}}</li>
                </ul>
            </div>

            {!!$article->body!!}
            <div class="clearfix"></div>
            <div class="hrgrey">
                <hr/>
            <div id="share">
            <span style="vertical-align: middle">{{Lang::get('news.share')}}</span>


            <ul>
                <li><a data-text="{{$article->title_page}}" target="_blank" href="https://twitter.com/share"><img src="/images/twitter.png" alt="Twitter Share"/></a></li>
                <script>
                window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
                </script>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" target="_blank"><img src="/images/facebook.png" alt="Facebook Share"/></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url={{URL::current()}}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="/images/google.png" alt="Google Share"/></a></li>

                <li><a target="_blank" href="https://www.linkedin.com/cws/share?url={{URL::current()}}"><img src="/images/in.png" alt="In Share"/></a></li>
            </ul>

            </div>    
            </div>
        </div>

        <div class="related">

            <div>{{Lang::get('news.related')}}</div>
            <ul>
            @foreach($related_news as $rel)
            <li class="related_link">
                                <ul  class="date col-md-2 col-xs-2">
                                    <li>{{($rel->created_at->day>=10?$rel->created_at->day:'0'.$rel->created_at->day).'.'.($rel->created_at->month>=10?$rel->created_at->month:'0'.$rel->created_at->month)}}</li>
                                    <li>{{$rel->created_at->year}}</li>
                                </ul>
                                <div class=" col-md-10 col-xs-10"><a href="">{{$rel->title_news}}</a></div>
                            </li>
                            <div class="clearfix"></div>
            @endforeach




            </ul>

        </div>
        <div id="comments">
            <h3>{{Lang::get('news.commenth')}}</h3>
            @if($article->comments->count()>0)

            @foreach($article->comments as $comment)

             <div class="media">
                            <div class="media-left">
                                
                                    <img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEyLjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" alt="...">
                                
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}</h4>


                                {!!$comment->comment_body!!}


                            </div>
                        </div>
            @endforeach
            @else
            <div style="font-size: 20px">{{Lang::get('news.no_comments')}}</div>
            @endif




        </div>

        <div id="comments_edit">
<script type="text/javascript">
$(document).ready(function(){
var elem=$(".limit");
    $("#comment_text").limiter(1000,elem);
});

</script>
            <h3>{{Lang::get('news.post_comment')}}</h3>
            {{--<form accept-charset="UTF-8" action="http://binary/en/converter/news/voluptatibus/add_comment" method="POST"><input type="hidden" value="KqmItZkvfUXCVFKsenQEhFPHxFccaNwS52XFc0mo" name="_token">--}}

                {{--<textarea cols="50" name="comment_body" style="resize:none" rows="3" class="form-control comment_text"></textarea>--}}
                {{--<input type="submit" value="POST COMMENT" class="btn btn-primary">--}}
            {{--</form>--}}
                    {!!Form::open(['method'=>'post','action'=>['NewsController@addComment','item'=>$article->slug]])!!}
                    <div class="form-inline">
                       {!!Form::input('text','author',null,['class'=>'form-control','placeholder'=>Lang::get('news.name'),'required'=>'required'])!!}
                       {!!Form::input('email','email',null,['class'=>'form-control','placeholder'=>Lang::get('news.email'),'required'=>'required'])!!}
                    </div>
                    {!!Form::textarea('comment_body',null,['id'=>'comment_text','class'=>'form-control comment_text','cols'=>50,'rows'=>3,'style'=>'resize:none','placeholder'=>Lang::get('news.comment_placeholder'),'required'=>'required'])!!}
                    {!!Form::submit(Lang::get('news.post_comment'),['class'=>'btn btn-primary'])!!}
                    <span  style="float: right;margin-top: 25px">{{Lang::get('news.symbols')}} <span class="limit"></span></span>
                    {!!Form::close()!!}

        </div>


    </div>
    <div class="lfside  col-md-3 col-xs-12 col-sm-3">
            <span style="display:inline-block;font: bold 21px 'Open Sans';color:#fff;margin:12px 0 0 15px">{{Lang::get('categories.categories')}}</span>
            <ul class="category_list">
                @foreach($categories as $category)
                    <li>
                       <a  href="{{URL::action('NewsController@getNewsPageByCategory',['category'=>$category->slug]).'/'.'#news_anchor'}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
</div>

@endsection