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
		if(!Input::hasFile('image')){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			if (Input::hasFile('image')){
				Input::file('image')->move('affiches',Input::file('image')->getClientOriginalName());
				$affiche=Affiche::create(array('image'=>Input::file('image')->getClientOriginalName()));
			}

		}
		return Redirect::action('AffichesController@edit', $affiche->id)->with(['success' => 'Affiche Ajoutée']);
	}

	public function view($id)
	{
		$affiche = Affiche::where('id',$id)->firstOrFail();
		
		// get previous Affiche id
	    $previous = Affiche::where('id', '<', $affiche->id)->max('id');

	    // get next Affiche id
	    $next = Affiche::where('id', '>', $affiche->id)->min('id');

		$this->layout->nest('content','affiches.view',compact('affiche','previous','next'));
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
