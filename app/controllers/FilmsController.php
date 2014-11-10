<?php

class FilmsController extends BaseController{

	public function index()
	{
		$films=Film::with('realisateur')->paginate(10);		
		$this->layout->nest('content','films.index',compact('films'));
	}

	public function create()
	{
		$film = new Film();
		$this->layout->nest('content','films.edit',compact('film'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Film::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$film=Film::create(Input::all());
		}
		return Redirect::action('FilmsController@edit', $film->id)->with(['success' => 'Film Ajouté']);
	}

	public function view($id)
	{
		$film = Film::with('realisateur')->where('id',$id)->firstOrFail();
		$this->layout->nest('content','films.view',compact('film'));		
	}

	public function edit($id)
	{
		$film = Film::findOrFail($id);
		$this->layout->nest('content','films.edit',compact('film'));
	}


	public function update($id)
	{
		$film = Film::findOrFail($id);
		$v = Validator::make(Input::all(),Film::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$film->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Film Modifié']);
		
	}

	public function delete($id)
	{
		Film::destroy($id);
		return Redirect::to('/')->with('success','Film Supprimé');
	}
}