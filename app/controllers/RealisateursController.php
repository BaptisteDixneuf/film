<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class RealisateursController extends BaseController{


	public function index()
	{
		$realisateurs=Realisateur::with('films')->paginate(10);		
		$this->layout->nest('content','realisateurs.index',compact('realisateurs'));
	}

	public function create(){
		$realisateur = new Realisateur();
		$this->layout->nest('content','realisateurs.edit',compact('realisateur'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Realisateur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$realisateur=Realisateur::create(Input::all());
		}
		return Redirect::action('RealisateursController@view', $realisateur->id)->with(['success' => 'Réalisateur Ajouté']);
	}

	public function add(){		
		$v = Validator::make(Input::all(),Realisateur::$rules);
		if($v->fails()){
			return "Non Valide";
		}else{
			$realisateur=Realisateur::create(Input::all());
		}
		return $realisateur;
		exit();
	}

	public function view($id)
	{
		try{
			$realisateur = Realisateur::with('films')->where('id',$id)->firstOrFail();
			
			// get previous realisateur id
			$previous = Realisateur::where('id', '<', $realisateur->id)->max('id');

		    // get next realisateur id
			$next = Realisateur::where('id', '>', $realisateur->id)->min('id');
			
			$this->layout->nest('content','realisateurs.view',compact('realisateur','previous','next'));
			
		}catch(ModelNotFoundException $e){
			$erreur = "Ce réalisateur n'existe pas dans la base de données";
			$this->layout->nest('content','errors.index',compact('erreur'));
		}	
	}

	public function edit($id)
	{
		$realisateur = Realisateur::findOrFail($id);
		$this->layout->nest('content','realisateurs.edit',compact('realisateur'));
	}


	public function update($id)
	{
		$realisateur = Realisateur::findOrFail($id);
		$v = Validator::make(Input::all(),Realisateur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$realisateur->update(Input::all());
		}		
		return Redirect::action('RealisateursController@view', $realisateur->id)->with(['success' => 'Réalisateur Modifié']);
		
	}

	public function delete($id)
	{
		$realisateur = Realisateur::with('films')->where('id',$id)->firstOrFail();
		if($realisateur->films->count() == 0)
		{
			$realisateur->delete();
			$type='success';
			$message ="Réalisateur Supprimé";
		} else {
			$type='error';
			$message='Ce réalisateur ne peut pas être supprimé parce qu\'il est lié à un/plusieurs films !';
		}		
		return Redirect::to('/')->with($type,$message);
	}

	public function search(){

		$realisateurs=Realisateur::select(array('id','pre_nom_rea'))
		->where('pre_nom_rea','LIKE','%'.Input::get('q').'%')
		->get();
		$liste_realisateurs=array();
		$i=0;
		foreach ($realisateurs as $realisateur) {
			$liste_realisateurs[$i]['id']=$realisateur->id;
			$liste_realisateurs[$i]["name"]=$realisateur->pre_nom_rea;
			$i++;
		}	
		return $liste_realisateurs;
	}



}