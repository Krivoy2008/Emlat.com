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
@include('news.banner')

<div class="container margin-top-20" >
<div class="row-fluid">
    <div class="blnews col-lg-9 col-md-9 col-sm-9 col-xs-12">
    @foreach($news as $article)

        <div class="itemIndex">
            <div class="row">
            <div class="col-md-3 col-sm-3 hidden-xs">
                <img class="news_image" src="{{$article->image}}" alt="{{$article->title_news}}"/>
            </div>
            <div class="col-md-9 col-sm-9 ">
                <div class="row">
                <div class="col-md-1 col-xs-2 hidden-xs no-padding">
                    <ul  class="date " >
                        <li>{{($article->created_at->day>=10?$article->created_at->day:'0'.$article->created_at->day).'.'.($article->created_at->month>=10?$article->created_at->month:'0'.$article->created_at->month)}}</li>
                        <li>{{$article->created_at->year}}</li>
                    </ul>
                </div>
                <div class="col-md-11 col-xs-12">
                    <h3>

                        <a href="{{URL::action('NewsController@index',['category'=>$article->category->slug,'item'=>$article->slug]).'/'}}" class="title">{{$article->title_news}}</a>

                    </h3>
                </div>
                </div>
                <div class="row-fluid text_news" style="">

                        <img style="float: left" class="mobile_news_image visible-xs" src="{{$article->image}}" alt="{{$article->title_news}}"/>

                 {!!str_limit($article->body, 200, '...')!!}



                </div>
                <hr style="margin:13px 0" />
                <div class="row">
                    <div class="col-md-6 col-xs-6 no-padding">
                        <div  style="margin-left: 10px">{{Lang::get('news.posted')}} Admin {{$article->created_at}}</div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div style="text-align: right"><span class="glyphicon glyphicon-comment" style="color:#bebebe;margin:0 3px 0 0;padding-top: 2px" aria-hidden="true"></span>{{$article->comments->count()}} {{Lang::get('news.comments')}}</div>
                    </div>
                </div>

            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="lfside  col-md-3 col-xs-12 col-sm-3 hidden-xs ">
        <span style="display:inline-block;font: bold 21px 'Open Sans';color:#fff;margin:12px 0 0 15px">Categories</span>
        <ul class="category_list">
            @foreach($categories as $category)
                <li>
                   <a @if(isset($active_category) && $active_category->id==$category->id)class="active"@endif href="{{URL::action('NewsController@getNewsPageByCategory',['category'=>$category->slug]).'/'.'#news_anchor'}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

</div>
  {{--pagination--}}
  <div class="container">
  <div class="pull-left" style="text-align: center">
    {!!$news->render()!!}
    </div>
    </div>
    {{--pagination--}}
@endsection