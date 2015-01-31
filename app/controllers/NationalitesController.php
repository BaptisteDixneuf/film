<?php

class NationalitesController extends BaseController{

	public function index()
	{
		$nationalites=Nationalite::with('films')->paginate(10);		
		$this->layout->nest('content','nationalites.index',compact('nationalites'));
	}

	public function create()
	{
		$nationalite = new Nationalite();
		$this->layout->nest('content','nationalites.edit',compact('nationalite'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Nationalite::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$nationalite=Nationalite::create(Input::all());
		}
		return Redirect::action('NationalitesController@edit', $nationalite->id)->with(['success' => 'Nationalite Ajouté']);
	}

	public function view($id)
	{
		$nationalite = Nationalite::with('films')->where('id',$id)->firstOrFail();
		$this->layout->nest('content','nationalites.view',compact('nationalite'));		
	}

	public function edit($id)
	{
		$nationalite = Nationalite::findOrFail($id);
		$this->layout->nest('content','nationalites.edit',compact('nationalite'));
	}

	public function add(){		
		$v = Validator::make(Input::all(),Nationalite::$rules);
		if($v->fails()){
			return "Non Valide";
		}else{
			$nationalite=Nationalite::create(Input::all());
		}
		return $nationalite;
		exit();
	}

	public function update($id)
	{
		$nationalite = Nationalite::findOrFail($id);
		$v = Validator::make(Input::all(),Nationalite::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$nationalite->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Nationalite Modifié']);
		
	}

	public function delete($id)
	{
		Nationalite::destroy($id);
		return Redirect::to('/')->with('success','Nationalite Supprimé');
	}
}