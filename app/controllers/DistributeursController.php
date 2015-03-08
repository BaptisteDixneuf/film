<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class DistributeursController extends BaseController{

	public function index()
	{
		$distributeurs=Distributeur::with('films')->orderBy('nom', 'asc')->paginate(10);		
		$this->layout->nest('content','distributeurs.index',compact('distributeurs'));
	}

	public function create()
	{
		$distributeur = new Distributeur();
		$this->layout->nest('content','distributeurs.edit',compact('distributeur'));
	}

	public function store(){
		$v = Validator::make(Input::all(),Distributeur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$distributeur=Distributeur::create(Input::all());
		}
		return Redirect::action('DistributeursController@edit', $distributeur->id)->with(['success' => 'Distributeur Ajouté']);
	}

	public function add(){		
		$v = Validator::make(Input::all(),Distributeur::$rules);
		if($v->fails()){
			return "Non Valide";
		}else{
			$distributeur=Distributeur::create(Input::all());
		}
		return $distributeur;
		exit();
	}

	public function view($id)
	{
		try{
			$distributeur = Distributeur::with('films')->where('id',$id)->firstOrFail();		

			// get previous Distributeur id
		    $previous = Distributeur::where('id', '<', $distributeur->id)->max('id');

		    // get next Distributeur id
		    $next = Distributeur::where('id', '>', $distributeur->id)->min('id');

			$this->layout->nest('content','distributeurs.view',compact('distributeur','previous','next'));

		}catch(ModelNotFoundException $e){
		    $erreur = "Ce distributeur n'existe pas";
		    $this->layout->nest('content','errors.index',compact('erreur'));
		}		
	}

	public function edit($id)
	{
		$distributeur = Distributeur::findOrFail($id);
		$this->layout->nest('content','distributeurs.edit',compact('distributeur'));
	}


	public function update($id)
	{
		$distributeur = Distributeur::findOrFail($id);
		$v = Validator::make(Input::all(),Distributeur::$rules);
		if($v->fails()){
			return Redirect::back()->withInput()->withErrors($v->errors());
		}else{
			$distributeur->update(Input::all());
		}		
		return Redirect::back()->with(['success' => 'Distributeur Modifié']);
		
	}

	public function delete($id)
	{
		
		$distributeur = Distributeur::with('films')->where('id',$id)->firstOrFail();
	    if($distributeur->films->count() == 0)
	    {
	        $distributeur->delete();
	        $type='success';
	        $message ="Distributeur Supprimé";
	    } else {
	       $type='error';
	       $message='Ce distrubuteur ne peut pas être supprimé parce qu\'il est lié à un/plusieurs films !';
	    }		
		return Redirect::to('/')->with($type,$message);

	}
}