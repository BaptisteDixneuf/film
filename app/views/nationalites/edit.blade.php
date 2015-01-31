{{ Form::model(
	$nationalite,
	array('url' =>
	$nationalite->id? URL::action('NationalitesController@update', $nationalite->id): URL::action('NationalitesController@store')
	))
}}
	<div class="form-group">
    	{{
    		Form::label(
    			'nationalite',
    			"Nationalité:",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'nationalite',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('nationalite'))
	    	<p class="help-block">
		    	{{$errors->first('nationalite')}}
		    </p>
    	@endif
  	</div>

  	
	{{Form::submit()}}
{{Form::close()}}