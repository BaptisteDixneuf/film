<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
		if(!Input::hasFile('image')){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			if (Input::hasFile('image')){
				Input::file('image')->move('affiches',Input::file('image')->getClientOriginalName());
				$affiche=Affiche::create(array('image'=>Input::file('image')->getClientOriginalName()));
			}

		}
		return Redirect::action('AffichesController@view', $affiche->id)->with(['success' => 'Affiche Ajoutée']);
	}

	public function view($id)
	{
		try{
			$affiche = Affiche::where('id',$id)->firstOrFail();
			
			// get previous Affiche id
			$previous = Affiche::where('id', '<', $affiche->id)->max('id');

		    // get next Affiche id
			$next = Affiche::where('id', '>', $affiche->id)->min('id');

			$this->layout->nest('content','affiches.view',compact('affiche','previous','next'));

		}catch(ModelNotFoundException $e){
			$erreur = "Cette affiche n'existe pas";
			$this->layout->nest('content','errors.index',compact('erreur'));
		}
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
			if (Input::hasFile('image')){
				//var_dump(Input::file('image')->getClientOriginalName());
				//exit();
				Input::file('image')->move('affiches',Input::file('image')->getClientOriginalName());				
				$affiche->update(array('image' => Input::file('image')->getClientOriginalName()));
			}
		}
		return Redirect::action('AffichesController@view', $affiche->id)->with(['success' => 'Affiche Modifiée']);

	}

	public function delete($id)
	{
		$affiche = Affiche::with('films')->where('id',$id)->firstOrFail();
		
		if( $affiche->films->count() == 0)
		{
			$affiche->delete();
			$type='success';
			$message ="Affiche Supprimé";
		} else {
			$type='error';
			$message='Cette affiche ne peut pas être supprimé parce qu\'elle est lié à un/plusieurs films !';
		}		
		return Redirect::to('/')->with($type,$message);
	}
}
