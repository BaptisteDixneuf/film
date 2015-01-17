<?php

class FilmsController extends BaseController{

	public function index()
	{
		$films=Film::with('realisateur','acteurs','distributeur','genre','affiche')->paginate(10);		
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
			//Insertion Image
			if(!Input::hasFile('image')){				
				return Redirect::back()->withInput()->withErrors($v->errors());
			}else{
				if (Input::hasFile('image')){		
					Input::file('image')->move('affiches',Input::file('image')->getClientOriginalName());				
					$affiche=Affiche::create(array('image'=>Input::file('image')->getClientOriginalName()));
				}
			}
					
			//Insertion film
			$film=Film::create(array(
			'titre' => Input::get('titre'),
			'synopsys' => Input::get('synopsys'),
			'avis' => Input::get('avis'),
			'annee_prod' => Input::get('annee_prod'),
			'titre_francais' => Input::get('titre_francais'),
			'prix' => Input::get('prix'),
			'realisateur_id' => Input::get('realisateur_id'),
			'distributeur_id' => Input::get('distributeur_id'),
			'genre_id' => Input::get('genre_id'),
			'affiche_id' => $affiche->id
			));

			$acteurs=Array();
			if(Input::has('acteurs')) {
				$acteurs = explode(',', Input::get('acteurs'));
				$film = Film::find($film->id);				
			}
			$film->acteurs()->sync($acteurs);
		}
		return Redirect::action('FilmsController@edit', $film->id)->with(['success' => 'Film Ajouté']);
	}

	public function view($id)
	{
		$film = Film::with('realisateur','acteurs','distributeur','genre','affiche')->where('id',$id)->firstOrFail();
		// get previous film id
	    $previous = Film::where('id', '<', $film->id)->max('id');

	    // get next film id
	    $next = Film::where('id', '>', $film->id)->min('id');

		$this->layout->nest('content','films.view',compact('film','previous','next'));		
	}

	public function edit($id)
	{
		$film = Film::with('realisateur','acteurs','distributeur','genre','affiche')->findOrFail($id);
		$this->layout->nest('content','films.edit',compact('film'));
	}


	public function update($id)
	{
		$film = Film::findOrFail($id);
		$v = Validator::make(Input::all(),Film::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			//Insertion Image
			if(!Input::hasFile('image')){				
				return Redirect::back()->withInput()->withErrors($v->errors());
			}else{
				if (Input::hasFile('image')){		
					Input::file('image')->move('affiches',Input::file('image')->getClientOriginalName());				
					$affiche=Affiche::create(array('image'=>Input::file('image')->getClientOriginalName()));
				}
			}
			$film->update(array(
			'titre' => Input::get('titre'),
			'synopsys' => Input::get('synopsys'),
			'avis' => Input::get('avis'),
			'annee_prod' => Input::get('annee_prod'),
			'titre_francais' => Input::get('titre_francais'),
			'prix' => Input::get('prix'),
			'realisateur_id' => Input::get('realisateur_id'),
			'distributeur_id' => Input::get('distributeur_id'),
			'genre_id' => Input::get('genre_id'),
			'affiche_id' => $affiche->id
			));

			

			$acteurs=Array();
			if(Input::has('acteurs')) {
				$acteurs = explode(',', Input::get('acteurs'));
				$film = Film::find($film->id);				
			}
			$film->acteurs()->sync($acteurs);
				
		}
				
		return Redirect::back()->with(['success' => 'Film Modifié']);
		
	}

	public function delete($id)
	{
		Film::destroy($id);
		return Redirect::to('/')->with('success','Film Supprimé');
	}
}