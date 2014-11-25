

{{ Form::model(
	$film,
	array('url' =>
	$film->id? URL::action('FilmsController@update', $film->id): URL::action('FilmsController@store')
	))
}}


	<div class="form-group">
    	{{
    		Form::label(
    			'nom',
    			"Titre du film",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::text(
    			'titre',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('titre'))
	    	<p class="help-block">
		    	{{$errors->first('titre')}}
		    </p>
    	@endif
  	</div>

   	<div class="form-group">
    	{{
    		Form::label(
    			'synopsys',
    			"Synopsys du film",
    	 		['class' => 'form-label']
    	 	)
    	}}
    	{{
    		Form::textarea(
    			'synopsys',
    			null,
    			['class' => 'form-control']
    		)
    	}}
    	@if($errors->has('synopsys'))
	    	<p class="help-block">
		    	{{$errors->first('synopsys')}}
		    </p>
    	@endif
  	</div>

    <div class="form-group">
        {{
            Form::label(
                'avis',
                "Avis sur le film",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::textarea(
                'avis',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('avis'))
            <p class="help-block">
                {{$errors->first('avis')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'annee_prod',
                "Année de production",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'annee_prod',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('annee_prod'))
            <p class="help-block">
                {{$errors->first('annee_prod')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'titre_francais',
                "Titre Français",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'titre_francais',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('titre_francais'))
            <p class="help-block">
                {{$errors->first('titre_francais')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'prix',
                "Prix ",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::text(
                'prix',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('prix'))
            <p class="help-block">
                {{$errors->first('prix')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'realisateur_id',
                "Réalisateur",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'realisateur_id',
                Realisateur::lists('nom', 'id')
            )
        }}
        @if($errors->has('realisateur_id'))
            <p class="help-block">
                {{$errors->first('realisateur_id')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'distributeur_id',
                "Distributeur",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'distributeur_id',
                Distributeur::lists('nom', 'id')
            )
        }}
        @if($errors->has('distributeur_id'))
            <p class="help-block">
                {{$errors->first('distributeur_id')}}
            </p>
        @endif
    </div>
    
        <?php 
        $liste_acteurs=Array();
        $i=0;
        foreach ($film->acteurs as $acteur) {
            $liste_acteurs[$i]['id']=$acteur->id;
            $liste_acteurs[$i]["name"]=$acteur->nom.' '.$acteur->prenom;
            $i++;
        }
        
        ?>
        
    <div class="form-group">
        <label for="acteurs" class="form-label">Acteurs</label>
        <input class="form-control" name="acteurs" id="acteurs" type="text" value="">
    </div>
        


	{{Form::submit()}}
{{Form::close()}}


{{ HTML::script('js/jquery.tokeninput.js')}}

    <script type="text/javascript">
          $(document).ready(function() {
            $("#acteurs").tokenInput("http://local.dev/projetFilmApp/film/public/acteurs/search", {
                prePopulate: <?php echo json_encode($liste_acteurs); ?>
            });
        });
  </script>
