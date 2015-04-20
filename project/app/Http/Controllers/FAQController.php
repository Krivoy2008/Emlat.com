<?php namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Snippet;
use App\Top_menu;
use Illuminate\Http\Request;

class FAQController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(){
        parent::__construct();

        $this->breadcrumbs->addCrumb(\Lang::get('breadcrumbs.faq'));
    }
    public function index()
	{

        return view('faq')->with([
            'breadcrumbs'=>$this->breadcrumbs,
            'snippets'=>Snippet::all(),
            'top_menus'=>Top_menu::all(),
            'questions'=>Faq::all(),
            'title_block'=>\Lang::get(\Lang::get('breadcrumbs.faq')),



        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
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

}
