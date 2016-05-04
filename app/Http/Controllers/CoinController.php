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
		$coin=Coin::find($id);
 
		//If not exists throw error
		if (!$coin)
		{
			return response()->json(['status' => 1, 'message' => 'Recurso no encontrado'], 404);
		}
 
		return response()->json(['status' => 0,'result' => $coin], 200);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $coinId)
	{
		//Check if coin exists
		$coin=Coin::find($coinId);
 
		//If coin not exists throw error
		if (!$coin)
		{
			return response()->json(['status' => 1, 'message' => 'La moneda no existe'], 404);
		}	
 
		//Value of status received
		$status = $request->input('status');

		//Check if method is PUT or PATCH
		if ($request->method()==='PUT' || $request->method()==='PATCH')
		{
			//If status has value, modify it
			if ($status!=null && $status!='')
			{
				$coin->status = $status;
				
				//Update value and return
				$coin->save();
				return response()->json(['status' => 0,'result' => true], 200);
			}
			else
			{
				return response()->json(['status' => 1, 'message' => 'No se ha modificado ningún dato'], 404);
			}
 
		}
	}
}
