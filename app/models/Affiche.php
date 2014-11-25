<?php

class Affiche extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'image' =>'required|min:4'			
	];

}