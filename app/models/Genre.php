<?php

class Genre extends Eloquent{

	protected $guarded= array('id','updated_at','created_at');

	public static $rules = [
			'genre' =>'required|min:4'			
	];

}