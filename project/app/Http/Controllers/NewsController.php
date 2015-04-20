<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Snippet;
use App\Top_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller {

    public function __construct(){
        parent::__construct();

        $this->breadcrumbs->addCrumb(\Lang::get('breadcrumbs.news'),'news');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getNewsPageByCategory(Category $category)
	{
	  if($category->exists!=false){	
	  $this->breadcrumbs->addCrumb($category->name,\LaravelLocalization::getLocalizedURL(\LaravelLocalization::setLocale(),'/'.$category->slug));
	  
      return view('news')->with([
        'snippets'=>Snippet::all(),
        'top_menus'=>Top_menu::all(),
        'breadcrumbs'=>$this->breadcrumbs,
        'news'=>News::getNewsByCategory($category),
        'categories'=>Category::all(),
        'active_category'=>$category,
        'title_block'=>Category::find($category->id)->name,
        'articles_in_table'=>News::all()->sortByDesc('created_at')->take(4),
        'metatitle'=>$category->metatitle,
        'metadescription'=>$category->metadescription,
        'metakeywords'=>$category->metakeywords
        ]);
		}
		else
		return redirect('news');
	}
    public function getNewsPage()
    {
        return view('news')->with([
            'snippets'=>Snippet::all(),
            'top_menus'=>Top_menu::all(),
            'breadcrumbs'=>$this->breadcrumbs,
            'news'=>News::paginate(10),
            'categories'=>Category::all(),
            'title_block'=>\Lang::get('breadcrumbs.news'),
            'articles_in_table'=>News::all()->sortByDesc('created_at')->take(4),
            'metatitle'=>\Lang::get('news.metatitle'),
            'metadescription'=>\Lang::get('news.metadescription'),
            'metakeywords'=>\Lang::get('news.metakeywords')
        ]);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function index(Category $category,News $news)
    {
		
		if($category->exists!=false && $news->exists!=false){	
        $this->breadcrumbs->addCrumb($category->name,\LaravelLocalization::getLocalizedURL(\LaravelLocalization::setLocale(),'/news/'.$category->slug));
        $this->breadcrumbs->addCrumb(str_limit($news->title_news, 30, '...'),'/'.$news->slug);
        return view('news.index')->with([
            'snippets'=>Snippet::all(),
            'top_menus'=>Top_menu::all(),
            'breadcrumbs'=>$this->breadcrumbs,
            'article'=>$news,
            'categories'=>Category::all(),
            'active_category'=>$category,
            'title_block'=>$news->title_news,//now it's a title of article
            'related_news'=>$category->news()->take(4)->get(),
            'metatitle'=>$news->metatitle,
            'metadescription'=>$news->metadescription,
            'metakeywords'=>$news->metakeywords,
        ]);
		}
		else
		return redirect('news');
    }
	
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function addComment(News $news, Request $request){
     \App\Comment::addComment($news,$request);
     return \Redirect::back();
    }

}
