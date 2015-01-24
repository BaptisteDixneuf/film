<script type="text/javascript">

      function envoyerRealisateur(){
        listparam="pre_nom_rea="+$("#pre_nom_rea").val();
          $.post( 
             "{{ URL::action('RealisateursController@add')}}",
             listparam,
             function(data) {
                console.log(data);
             }

          );
      };
  

</script>

{{ Form::model(
	$film,
	array('url' =>
	$film->id? URL::action('FilmsController@update', $film->id): URL::action('FilmsController@store'),
    'files' => true
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
                'image',
                "Image",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::file(
                'image',
                null,
                ['class' => 'form-control']
            )
        }}
        @if($errors->has('image'))
            <p class="help-block">
                {{$errors->first('image')}}
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
                Realisateur::orderBy('pre_nom_rea')->lists('pre_nom_rea', 'id')
            )
        }}
        @if($errors->has('realisateur_id'))
            <p class="help-block">
                {{$errors->first('realisateur_id')}}
            </p>
        @endif 
        
    </div>

        <a href="#" class="big-link" data-reveal-id="myModal">
            Ajouter un réalisateur
        </a> 
        <div id="myModal" class="reveal-modal">

            <div class="form-group">
                {{
                    Form::label(
                        'pre_nom_rea',
                        "Prenom et Nom du réalisateur",
                        ['class' => 'form-label']
                    )
                }}
                {{
                    Form::textarea(
                        'pre_nom_rea',
                        null,
                        ['class' => 'form-control']
                    )
                }}
                    <div id="bouttonsRealisateurs">
                    <input type='button' value='Ajouter' onclick='envoyerRealisateur()' />
                    </div>
            </div>           
            
            <a class="close-reveal-modal">&#215;</a>
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
                Distributeur::orderBy('nom')->lists('nom', 'id')
            )
        }}
        @if($errors->has('distributeur_id'))
            <p class="help-block">
                {{$errors->first('distributeur_id')}}
            </p>
        @endif
    </div>

    <div class="form-group">
        {{
            Form::label(
                'genre_id',
                "Genre:",
                ['class' => 'form-label']
            )
        }}
        {{
            Form::select(
                'genre_id',
                Genre::orderBy('genre')->lists('genre', 'id')
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
            $liste_acteurs[$i]["name"]=$acteur->pre_nom_acteur;
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


