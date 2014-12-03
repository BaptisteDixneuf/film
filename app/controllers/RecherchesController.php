<?php

class RecherchesController extends BaseController{

	public function index($message=false){
		$this->layout->nest('content','recherches.index',compact('message'));
	}

	public function view(){
		$type=Input::get('optionsRadios');
		$base_chemin=ucfirst($type).'sController@view';
		switch (Input::get('optionsRadios')) {
		    case 'film':
		        $data=Film::select(array('id','titre as value'))
				->where('titre','LIKE','%'.Input::get('InputRecherche').'%')
				->get();
		        break;
		    case 'realisateur':
		        $data=Realisateur::select(array('id','pre_nom_rea as value'))
				->where('pre_nom_rea','LIKE','%'.Input::get('InputRecherche').'%')
				->get();
		        break;
		    case 'distributeur':
		       	$data=Distributeur::select(array('id','nom as value'))
				->where('nom','LIKE','%'.Input::get('InputRecherche').'%')
				->get();
		        break;
		    case 'genre':
		       	$data=Genre::select(array('id','genre as value'))
				->where('genre','LIKE','%'.Input::get('InputRecherche').'%')
				->get();
		        break; 
		    case 'acteur':
		       	$data=Acteur::select(array('id','pre_nom_acteur as value'))
				->where('pre_nom_acteur','LIKE','%'.Input::get('InputRecherche').'%')
				->get();			
		        break;    
		    default:
		       echo "Recherche Erronéee ";
		}
		$this->layout->nest('content','recherches.view',compact('data','base_chemin'));
		
	}

}

