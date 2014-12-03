<h1> Recherche </h1>
	
	<div class="messsage">{{ isset($messsage ) ? $messsage  : '' }}</div>

<form role="form" method="post" action="{{ URL::action("RecherchesController@view") }}">
	<div class="form-group">
	    <label for="InputRecherche">Recherche (*) : </label>
	    <input type="search" class="form-control" id="InputRecherche" name="InputRecherche">
	</div>
	<div class="radio">
	  	<label>
	    	<input type="radio" name="optionsRadios" id="optionsRadios1" value="film" checked>
	    	Film
	  	</label>
	</div>
	<div class="radio">
	  	<label>
	    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="realisateur">
	    	Réalisateur
	  </label>
	</div>
	<div class="radio">
	  	<label>
	    	<input type="radio" name="optionsRadios" id="optionsRadios3" value="distributeur">
	    	Distributeur
	  </label>
	</div>
	<div class="radio">
	  	<label>
	    	<input type="radio" name="optionsRadios" id="optionsRadios4" value="genre">
	    	Genre
	  </label>
	</div>
	<div class="radio">
	  	<label>
	    	<input type="radio" name="optionsRadios" id="optionsRadios4" value="acteur">
	    	Acteur
	  </label>
	</div>
 
 
  <button type="submit" class="btn btn-default">Rechercher</button>
</form>