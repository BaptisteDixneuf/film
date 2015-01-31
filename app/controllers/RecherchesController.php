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
				->orderBy('titre')
				->get();
		        break;
		    case 'realisateur':
		        $data=Realisateur::select(array('id','pre_nom_rea as value'))
				->where('pre_nom_rea','LIKE','%'.Input::get('InputRecherche').'%')
				->orderBy('pre_nom_rea')
				->get();
		        break;
		    case 'distributeur':
		       	$data=Distributeur::select(array('id','nom as value'))
				->where('nom','LIKE','%'.Input::get('InputRecherche').'%')
				->orderBy('nom')
				->get();
		        break;
		    case 'genre':
		       	$data=Genre::select(array('id','genre as value'))
				->where('genre','LIKE','%'.Input::get('InputRecherche').'%')
				->orderBy('genre')
				->get();
		        break; 
		    case 'acteur':
		       	$data=Acteur::select(array('id','pre_nom_acteur as value'))
				->where('pre_nom_acteur','LIKE','%'.Input::get('InputRecherche').'%')
				->orderBy('pre_nom_acteur')
				->get();			
		        break;
		    case 'nationalite':
		       	$data=Nationalite::select(array('id','nationalite as value'))
				->where('nationalite','LIKE','%'.Input::get('InputRecherche').'%')
				->orderBy('nationalite')
				->get();			
		        break;      
		    default:
		       echo "Recherche Erronéee ";
		       exit();
		}
		$this->layout->nest('content','recherches.view',compact('data','base_chemin'));
		
	}

}

