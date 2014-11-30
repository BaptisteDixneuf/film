<?php

class AffichesController extends BaseController{

	public function index()
	{
		$affiches=Affiche::paginate(10);		
		$this->layout->nest('content','affiches.index',compact('affiches'));
	}

	public function create()
	{
		$affiche = new Affiche();
		$this->layout->nest('content','affiches.edit',compact('affiche'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Affiche::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$affiche=Affiche::create(Input::all());
		}
		return Redirect::action('AffichesController@edit', $affiche->id)->with(['success' => 'Affiche Ajoutée']);
	}

	public function view($id)
	{
		$affiche = Affiche::where('id',$id)->firstOrFail();
		$this->layout->nest('content','affiches.view',compact('affiche'));		
	}

	public function edit($id)
	{
		$affiche = Affiche::findOrFail($id);
		$this->layout->nest('content','affiches.edit',compact('affiche'));
	}


	public function update($id)
	{
		$affiche = Affiche::findOrFail($id);
		$v = Validator::make(Input::all(),Affiche::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$affiche->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Affiche Modifiée']);
		
	}

	public function delete($id)
	{
		Affiche::destroy($id);
		return Redirect::to('/')->with('success','Affiche Supprimée');
	}
}