<!DOCTYPE html>
<html lang="{{\LaravelLocalization::getCurrentLocale()}}">
   <head>
      <meta charset="UTF-8">
      <title>{{isset($metatitle)? $metatitle: 'Elmat.com'}}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="{{isset($metadescription)? $metadescription: 'Elmat.com'}}">
      <meta name="Keywords" content="{{isset($metakeywords)? $metakeywords: 'Elmat.com'}}">
      <link rel="canonical" href="{{URL::current().'/'}}" />
      <script src="/js/jquery.2.0.3.js"></script>
      <link href="/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="/css/bootstrap.css">
      <meta name="robots" content="noindex, nofollow">
      <link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
      <script src="/js/bootstrap.js"></script>

      <!--<script src="js/functions.js" type="text/javascript"></script>-->
      {{--<script src="/js/select2.min.js"></script>--}}
      <script src="/js/select2/select2.min.js"></script>


      
      <link rel="stylesheet" href="/css/style.css">
      <link rel="stylesheet" href="/css/media-queries.css">
      <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
   </head>
   <body>
      <nav class="navbar navbar-inverse ">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <a class="navbar-brand" href="{{LaravelLocalization::getLocalizedURL(App::getLocale(),'/')}}"><img  src="/images/logo.png" alt="Logo"></a>
               <select onchange="location = this.options[this.selectedIndex].value;" class="form-control mobile-lang">
                                                                       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                           <option @if(trim($localeCode)==\App::getLocale())selected="selected" @endif value="{{LaravelLocalization::getLocalizedURL($localeCode) }}">

                                                                                   {{{ trim($localeCode) }}}

                                                                           </option>
                                                                       @endforeach
                                                                   </select>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

               <ul class="nav navbar-nav navbar-right ">
                  <li><select onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <option @if(trim($localeCode)==\App::getLocale())selected="selected" @endif value="{{LaravelLocalization::getLocalizedURL($localeCode) }}">

                                                                    {{{ trim($localeCode) }}}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    </li>

                    <li><a href="{{LaravelLocalization::getLocalizedURL(App::getLocale(),'faq')}}">{{Lang::get('pagination.faq')}}</a></li>
                    <li><a href="{{LaravelLocalization::getLocalizedURL(App::getLocale(),'news')}}">{{Lang::get('pagination.news')}}</a></li>
                    <li><a href="{{LaravelLocalization::getLocalizedURL(App::getLocale(),'contacts')}}">{{Lang::get('pagination.contact')}}</a></li>





               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <!--End Bootstrap top-->
      <div class="clearfix"></div>
      <div class="container " >

         <div class="row">
         <div id="header_snippets">
         @foreach($snippets as $snippet)
            <div class="col-xs-6 col-sm-3">
                           <table >
                              <tr>
                                 <td rowspan="2"><img src="{{$snippet->img_url}}" alt=""/></td>
                                 <td>{{$snippet->name}}</td>
                              </tr>
                              <tr>
                                 <td> {!!$snippet->description!!} </td>
                              </tr>
                           </table>
                        </div>
         @endforeach
            </div>
        </div>



      </div>
      <!--header_snippets-->
      @yield('content')

      <div class="clearfix"></div>
      <div class="footer_back">
         <div class="container footer">
            <div class="row-fluid">
               <table class="powered">
                  <tr>
                     <td>© 2015 www.Emlat.com <span class="think">{{Lang::get('footer.all_right_reserved')}}</span></td>
                     <td class="lg"><span class="bot">{{Lang::get('footer.powered_by')}}</span> <img src="/images/footer_logo.png" alt="CherryTrade"></td>
                  </tr>
                  <tr>
                     <td colspan="2"><b>{{Lang::get('footer.disclaimer')}}</b>{{Lang::get('footer.text')}}</td>
                     <td></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      {{--<script src="/js/chosen.jquery.js"></script>--}}
	  <script type="text/javascript" src="/js/js.js"></script>
   </body>
</html>

