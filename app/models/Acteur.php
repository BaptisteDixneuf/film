<?php

class Acteur extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'nom' =>'required|min:4',
			'prenom' =>'required|min:4',
			'biographie' =>'required|min:4'
	];


	public function films()
	{
		return $this->belongsToMany('Film');
	}

}