{{ Form::model(
	$acteur,
	array('url' =>
	$acteur->id? URL::action('ActeursController@update', $acteur->id): URL::action('ActeursController@store')
	))
}}
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div class="btn btn-danger" >{{ $error }}</div>
  @endforeach
@endif  

	<div class="form-group">
    	{{
    		Form::label(
    			'pre_nom_acteur',
    			"Prénom et Nom de l'acteur : ",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'pre_nom_acteur',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('pre_nom_acteur'))
	    	<p class="help-block">
		    	{{$errors->first('pre_nom_acteur')}}
		    </p>
    	@endif
  	</div>  

	{{Form::submit('Enregistrer', ['class' => 'btn btn-primary'])}}
{{Form::close()}}