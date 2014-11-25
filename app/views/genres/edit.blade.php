{{ Form::model(
	$genre,
	array('url' =>
	$genre->id? URL::action('GenresController@update', $genre->id): URL::action('GenresController@store')
	))
}}
	<div class="form-group">
    	{{
    		Form::label(
    			'genre',
    			"Genre:",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'genre',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('genre'))
	    	<p class="help-block">
		    	{{$errors->first('genre')}}
		    </p>
    	@endif
  	</div>

  	
	{{Form::submit()}}
{{Form::close()}}