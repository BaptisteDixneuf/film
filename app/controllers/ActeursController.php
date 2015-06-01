<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
		return Redirect::action('ActeursController@view', $acteur->id)->with(['success' => 'Acteur Ajouté']);
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
		try{
			$acteur = Acteur::with('films')->where('id',$id)->firstOrFail();
			$this->layout->nest('content','acteurs.view',compact('acteur'));

			// get previous Acteur id
			$previous = Acteur::where('id', '<', $acteur->id)->max('id');

		    // get next Acteur id
			$next = Acteur::where('id', '>', $acteur->id)->min('id');

			$this->layout->nest('content','acteurs.view',compact('acteur','previous','next'));

		}catch(ModelNotFoundException $e){
			$erreur = "Cette acteur n'existe pas dans la base de données";
			$this->layout->nest('content','errors.index',compact('erreur'));
		}

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
		return Redirect::action('ActeursController@view', $acteur->id)->with(['success' => 'Acteur Modifié']);
		
	}

	public function delete($id)
	{
		$acteur = Acteur::with('films')->where('id',$id)->firstOrFail();		
		if( $acteur->films->count() == 0)
		{
			$acteur->delete();
			$type='success';
			$message ="Acteur Supprimé";
		} else {
			$type='error';
			$message='Cet Acteur ne peut pas être supprimé parce qu\'il est lié à un/plusieurs films !';
		}		
		return Redirect::to('/')->with($type,$message);
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