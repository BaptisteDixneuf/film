<?php

class Affiche extends Eloquent{

	protected $guarded= array('updated_at','created_at');

	public static $rules = [
			'image' =>'required|min:4'			
	];

	public function films() 
	{
	    return $this->hasMany('Film');
	}

}