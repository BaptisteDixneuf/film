<?php

class Film extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'titre' =>'required|min:4',
			'synopsys' =>'required|min:4',
			'avis' =>'required|min:4',
			'annee_prod' =>'required|min:4|max:4'			
	];


	public function realisateur() 
	{
	    return $this->belongsTo('Realisateur');
	}

	public function acteurs()
	{
		return $this->belongsToMany('Acteur');
	} 


}