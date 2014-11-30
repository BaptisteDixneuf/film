<?php

class Acteur extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'pre_nom_acteur' =>'required|min:4'			
	];


	public function films()
	{
		return $this->belongsToMany('Film');
	}

}