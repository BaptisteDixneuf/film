<?php

class AccueilsController extends BaseController{

	public function index(){
		$this->layout->nest('content','accueil.index');
	}

}

