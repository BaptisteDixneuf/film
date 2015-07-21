<?php

class Realisateur extends Eloquent{

	protected $guarded= array('updated_at','created_at');

	public static $rules = [
			'pre_nom_rea' =>'required|min:4'			
	];



	public function films() 
	{
	    return $this->hasMany('Film');
	}
}