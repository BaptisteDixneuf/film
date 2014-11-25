<?php

class GenresController extends BaseController{

	public function index()
	{
		$genres=Genre::paginate(10);		
		$this->layout->nest('content','Genres.index',compact('genres'));
	}

	public function create()
	{
		$genre = new Genre();
		$this->layout->nest('content','Genres.edit',compact('genre'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Genre::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$genre=Genre::create(Input::all());
		}
		return Redirect::action('GenresController@edit', $genre->id)->with(['success' => 'Genre Ajouté']);
	}

	public function view($id)
	{
		$genre = Genre::where('id',$id)->firstOrFail();
		$this->layout->nest('content','Genres.view',compact('genre'));		
	}

	public function edit($id)
	{
		$genre = Genre::findOrFail($id);
		$this->layout->nest('content','Genres.edit',compact('genre'));
	}


	public function update($id)
	{
		$genre = Genre::findOrFail($id);
		$v = Validator::make(Input::all(),Genre::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$genre->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Genre Modifié']);
		
	}

	public function delete($id)
	{
		Genre::destroy($id);
		return Redirect::to('/')->with('success','Genre Supprimé');
	}
}