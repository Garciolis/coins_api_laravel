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
		
		//Status cannot be null or empty
		if ($status==null || $status==='') {
			return response()->json(['status' => 1, 'message' => 'No se ha proporcionado valor para status'], 404);
		}
		
		//Status must have value 0, 1 or 2
		if ($status<0 || $status>3)
		{
			return response()->json(['status' => 1, 'message' => 'El valor proporcionado para status no es correcto'], 404);
		}

		//Check if method is PUT or PATCH and apply changes
		if ($request->method()==='PUT' || $request->method()==='PATCH')
		{
			$coin->status = $status;
			
			//Update value and return
			$coin->save();
			return response()->json(['status' => 0,'result' => true], 200);
		}
	}
}
