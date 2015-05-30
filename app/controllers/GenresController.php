<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
		return Redirect::action('GenresController@view', $genre->id)->with(['success' => 'Genre Ajouté']);
	}

	public function view($id)
	{
		try{
			$genre = Genre::with('films')->where('id',$id)->firstOrFail();

			// get previous Genre id
			$previous = Genre::where('id', '<', $genre->id)->max('id');

		    // get next Genre id
			$next = Genre::where('id', '>', $genre->id)->min('id');

			$this->layout->nest('content','genres.view',compact('genre','previous','next'));

		}catch(ModelNotFoundException $e){
			$erreur = "Ce genre n'existe pas";
			$this->layout->nest('content','errors.index',compact('erreur'));
		}	
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
		return Redirect::action('GenresController@view', $genre->id)->with(['success' => 'Genre Modifié']);
		
	}

	public function delete($id)
	{
		$genre = Genre::with('films')->where('id',$id)->firstOrFail();
		if($genre->films->count() == 0)
		{
			$genre->delete();
			$type='success';
			$message ="Genre Supprimé";
		} else {
			$type='error';
			$message='Ce genre ne peut pas être supprimé parce qu\'il est lié à un/plusieurs films !';
		}		
		return Redirect::to('/')->with($type,$message);
	}
}