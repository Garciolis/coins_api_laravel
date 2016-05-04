<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coin;

use App\Http\Requests;

class CoinController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Return all coins
		return response()->json(['status' => 0,'result' => Coin::all()], 200);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//Find coin by id
		$coin=Fabricante::find($id);
 
		//If not exists throw error
		if (!$coin)
		{
			return response()->json(['status' => 1, 'message' => 'Recurso no encontrado'],404);
		}
 
		return response()->json(['status' => 0,'result' => $coin],200);
	}
}
