<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Illuminate\Http\Request;
use Response;

class ApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function returnCSS()
	{
        $file='css/currency.default.css';
        if (File::isFile($file))
        {
            $file = File::get($file);
            $response = Response::make($file, 200);
            $response->header('Content-Type', 'text/css');

            return $response;
        }
	}
    public function  returnJS(){
        $file='js/jquery.currency.js';
        if (File::isFile($file))
        {
            $file = File::get($file);
            $response = Response::make($file, 200);
            $response->header('Content-Type', 'text/css');

            return $response;
        }
    }
    public function returnJSLoc(){
        $file='js/jquery.currency.localization.en_US.js';
        if (File::isFile($file))
        {
            $file = File::get($file);
            $response = Response::make($file, 200);
            $response->header('Content-Type', 'text/css');

            return $response;
        }

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
