<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
		try{
			$nationalite = Nationalite::with('films')->where('id',$id)->firstOrFail();
			
			// get previous Nationalite id
			$previous = Nationalite::where('id', '<', $nationalite->id)->max('id');

		    // get next Nationalite id
			$next = Nationalite::where('id', '>', $nationalite->id)->min('id');

			$this->layout->nest('content','nationalites.view',compact('nationalite','previous','next'));

		}catch(ModelNotFoundException $e){
			$erreur = "Cette nationalité n'existe pas dans la base de données";
			$this->layout->nest('content','errors.index',compact('erreur'));
		}	
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
		$nationalite = Nationalite::with('films')->where('id',$id)->firstOrFail();		
		if( $nationalite->films->count() == 0)
		{
			$nationalite->delete();
			$type='success';
			$message ="Nationalité Supprimé";
		} else {
			$type='error';
			$message='Cette nationalité ne peut pas être supprimé parce qu\'elle est lié à un/plusieurs films !';
		}		
		return Redirect::to('/')->with($type,$message);
	}

	public function search(){

		$nationalites=Nationalite::select(array('id','nationalite'))
		->where('nationalite','LIKE','%'.Input::get('q').'%')
		->get();
		$liste_nationalites=array();
		$i=0;
		foreach ($nationalites as $nationalite) {
			$liste_nationalites[$i]['id']=$nationalite->id;
			$liste_nationalites[$i]["name"]=$nationalite->nationalite;
			$i++;
		}	
		return $liste_nationalites;
	}
}