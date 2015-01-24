<?php

class ActeursController extends BaseController{


	public function index()
	{
		$acteurs=Acteur::with('films')->paginate(10);		
		$this->layout->nest('content','acteurs.index',compact('acteurs'));
	}

	public function create(){
		$acteur = new Acteur();
		$this->layout->nest('content','acteurs.edit',compact('acteur'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Acteur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$acteur=Acteur::create(Input::all());
		}
		return Redirect::action('ActeursController@edit', $acteur->id)->with(['success' => 'Acteur Ajouté']);
	}

	public function add(){		
		$v = Validator::make(Input::all(),Acteur::$rules);
		if($v->fails()){
			return "Non Valide";
		}else{
			$acteur=Acteur::create(Input::all());
		}
		return $acteur;
		exit();
	}

	public function view($id)
	{
		$acteur = Acteur::with('films')->where('id',$id)->firstOrFail();
		$this->layout->nest('content','acteurs.view',compact('acteur'));		
	}

	public function edit($id)
	{
		$acteur = Acteur::findOrFail($id);
		$this->layout->nest('content','acteurs.edit',compact('acteur'));
	}


	public function update($id)
	{
		$acteur = Acteur::findOrFail($id);
		$v = Validator::make(Input::all(),Acteur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$acteur->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Acteur Modifié']);
		
	}

	public function delete($id)
	{
		Acteur::destroy($id);
		return Redirect::to('/')->with('success','Acteur Supprimé');
	}

	public function search(){

		$acteurs=Acteur::select(array('id','pre_nom_acteur'))
				->where('pre_nom_acteur','LIKE','%'.Input::get('q').'%')
				->get();
		$liste_acteurs;
		$i=0;
		foreach ($acteurs as $acteur) {
			$liste_acteurs[$i]['id']=$acteur->id;
			$liste_acteurs[$i]["name"]=$acteur->pre_nom_acteur;
			$i++;
		}	
		return $liste_acteurs;
	}

}