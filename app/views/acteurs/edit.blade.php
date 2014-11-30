{{ Form::model(
	$acteur,
	array('url' =>
	$acteur->id? URL::action('ActeursController@update', $acteur->id): URL::action('ActeursController@store')
	))
}}
	<div class="form-group">
    	{{
    		Form::label(
    			'pre_nom_acteur',
    			"Prénom et Nom de l'acteur",
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

	{{Form::submit()}}
{{Form::close()}}