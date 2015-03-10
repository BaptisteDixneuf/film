<?php

class AccueilsController extends BaseController{

	public function index(){
		$count =  DB::table('films')->count();
		$films=Film::with('affiche')->orderBy('id','desc')->take(200)->get();
		$this->layout->nest('content','accueil.index',compact('count','films'));

	}

}

