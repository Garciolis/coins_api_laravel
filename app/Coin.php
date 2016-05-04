<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    //Table name in database
	protected $table = 'coin';
	
	//Attributes
	protected $fillable = array('country', 'year', 'relative_value', 'status');
	
	//Relationship with currency: A coin has only one currency
	public function currencies ()
	{
		return $this->belongsTo('App\Currency');
	}
}
