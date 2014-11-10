<?php

class Distributeur extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'nom' =>'required|min:4'			
	];

}