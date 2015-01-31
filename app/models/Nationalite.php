<?php

class Nationalite extends Eloquent{

	protected $guarded= array('updated_at','created_at');

	public static $rules = [
			'nationalite' =>'required|min:4'			
	];

	public function films() 
	{
	    return $this->hasMany('Film');
	}
	
}