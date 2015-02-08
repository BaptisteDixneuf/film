<?php

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
		return Redirect::action('RealisateursController@edit', $realisateur->id)->with(['success' => 'Réalisateur Ajouté']);
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
		$realisateur = Realisateur::with('films')->where('id',$id)->firstOrFail();
		
		// get previous realisateur id
	    $previous = Realisateur::where('id', '<', $realisateur->id)->max('id');

	    // get next realisateur id
	    $next = Realisateur::where('id', '>', $realisateur->id)->min('id');
	    
		$this->layout->nest('content','realisateurs.view',compact('realisateur','previous','next'));		
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
		return Redirect::back()->with(['success' => 'Réalisateur Modifié']);
		
	}

	public function delete($id)
	{
		Realisateur::destroy($id);
		return Redirect::to('/')->with('success','Réalisateur Supprimé');
	}

}