<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Snippet;
use App\Top_menu;
use Illuminate\Http\Request;
use Mail;

class ContactsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(){
        parent::__construct();
        $this->breadcrumbs->addCrumb(\Lang::get('breadcrumbs.contact'));
    }
	public function index()
	{

        return view('contacts')->with([
            'snippets'=>Snippet::all(),
            'top_menus'=>Top_menu::all(),
            'title_block'=>\Lang::get('breadcrumbs.contact'),
            'breadcrumbs'=>$this->breadcrumbs


        ]);
		//
	}
    public function sendMail(Request $request){
//        dd($request);
        Mail::send('emails.contacts', ['name' =>$request->name,'email'=>$request->email,'text'=>$request->text], function($message)
        {
            $message->to('andre@cherrytrade.com', 'Emlat.com')->subject('New mail from Emlat.com');
        });
        return \Redirect::back();
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
