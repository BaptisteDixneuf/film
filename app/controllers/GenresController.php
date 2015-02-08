<?php

class GenresController extends BaseController{

	public function index()
	{
		$genres=Genre::with('films')->paginate(10);		
		$this->layout->nest('content','genres.index',compact('genres'));
	}

	public function create()
	{
		$genre = new Genre();
		$this->layout->nest('content','genres.edit',compact('genre'));
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
		$genre = Genre::with('films')->where('id',$id)->firstOrFail();

		// get previous Genre id
	    $previous = Genre::where('id', '<', $genre->id)->max('id');

	    // get next Genre id
	    $next = Genre::where('id', '>', $genre->id)->min('id');

		$this->layout->nest('content','genres.view',compact('genre','previous','next'));	
	}

	public function edit($id)
	{
		$genre = Genre::findOrFail($id);
		$this->layout->nest('content','genres.edit',compact('genre'));
	}

	public function add(){		
		$v = Validator::make(Input::all(),Genre::$rules);
		if($v->fails()){
			return "Non Valide";
		}else{
			$genre=Genre::create(Input::all());
		}
		return $genre;
		exit();
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