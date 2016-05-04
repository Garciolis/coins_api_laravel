<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //Table name in database
	protected $table = 'currency';
	
	//Attributes
	protected $fillable = array('name', 'abbreviature', 'plural_name');
	
	//Relationship with coins: A currency can have many coins
	public function coins ()
	{
		return $this->hasMany('App\Coin');
	}
}
