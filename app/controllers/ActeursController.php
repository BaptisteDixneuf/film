<?php

class ActeursController extends BaseController{

	public function index()
	{
		$acteurs=Acteur::paginate(10);		
		return View::make('acteurs.index',compact('acteurs'));
	}

	public function view($id)
	{
		$acteur = Acteur::where('id',$id)->firstOrFail();
		return View::make('acteurs.view',compact('acteur'));
	}

}