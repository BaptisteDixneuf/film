<?php

class Genre extends Eloquent{

	protected $guarded= array('updated_at','created_at');

	public static $rules = [
			'genre' =>'required|min:4'			
	];

	public function films() 
	{
	    return $this->hasMany('Film');
	}
}