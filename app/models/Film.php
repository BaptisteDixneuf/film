<?php

class Film extends Eloquent{

	protected $guarded= array('updated_at','created_at');

	public static $rules = [
			'titre' =>'required|min:4',
			'synopsys' =>'required|min:4',
			'avis' =>'required|min:4',
			'annee_prod' =>'required|min:4|max:4',
			'realisateur_id' =>'required',
			'distributeur_id'=>'required',
			'genre_id'=>'required',
			'nationalite_id'=>'required'
			//'image'=>'required'	=> Lors de l'update le champs n'est pas pré-rempli 
	];


	public function realisateur() 
	{
	    return $this->belongsTo('Realisateur');
	}

	public function distributeur() 
	{
	    return $this->belongsTo('Distributeur');
	}

	public function genre() 
	{
	    return $this->belongsTo('Genre');
	}

	public function nationalite() 
	{
	    return $this->belongsTo('Nationalite');
	}

	public function affiche() 
	{
	    return $this->belongsTo('Affiche');
	}

	public function acteurs()
	{
		return $this->belongsToMany('Acteur');
	} 


}