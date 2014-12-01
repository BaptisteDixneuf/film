

<?php

class MigrationsController extends BaseController{


	
	


	public function index()
	{

   header ('Content-type:text/html; charset=utf-8');


		try {
		    $dbh = new PDO('mysql:host=127.0.0.1;dbname=base_film', "root", "root",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));		    		    
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
		
		function clean($data){

			$data=str_replace("&#185;", "¹", $data);
			$data=str_replace("&#192;", "¹", $data);			
			$data=str_replace("&#202;", "Ê", $data);			
			$data=str_replace("&#207;", "Ï", $data);			
			$data=str_replace("&#219;", "Û", $data);
			$data=str_replace("&#224;", "à", $data);
			$data=str_replace("&#227;", "ã", $data);
			$data=str_replace("&#232;", "è", $data);
			$data=str_replace("&#234;", "ê", $data);
			$data=str_replace("&#239;", "î", $data);
			$data=str_replace("&#239;", "î", $data);
			$data=str_replace("&#241;", "ñ", $data);	
			$data=str_replace("&#249;", "ù", $data);	
			$data=str_replace("&#339;", "oe", $data);					
			$data=str_replace("&#251;", "û", $data);
			$data=str_replace("&#45432;", "노", $data);
			$data=str_replace("&#45432;", "가", $data);
			$data=str_replace("&#44032;", "가", $data);
			$data=str_replace("&#45796;", "다", $data);
			$data=str_replace("&#64258;", "ﬂ", $data);

					
			return $data;
		}

		

		foreach($dbh->query('SELECT * FROM affiche') as $row) {

			Affiche::create(array(
			'id' => $row['num_affiche' ],
			'image' => $row['image' ]
			));
       		
    	}
    	var_dump("Table affiches migrée");


    	foreach($dbh->query('SELECT * FROM realisateur') as $row) {


    		//var_dump($row);
			Realisateur::create(array(
			'id' => $row['num_rea' ],
			'pre_nom_rea' => $row['pre_nom_rea' ]
			));
       		
    	}
    	var_dump("Table realisateurs migrée");


    	foreach($dbh->query('SELECT * FROM acteur') as $row) {


    		//var_dump($row);
			Acteur::create(array(
			'id' => $row['num_acteur' ],
			'pre_nom_acteur' => $row['pre_nom_acteur' ]
			));
       		
    	}
    	var_dump("Table acteurs migrée");


		foreach($dbh->query('SELECT * FROM film') as $row) {



			


			$affiche_id='1';
			if(isset($row['num_affiche' ]) && $row['num_affiche' ]!='' ){
				$affiche_id=$row['num_affiche' ];
			}
			
			$film=Film::create(array(
			'id' => $row['num_film' ],
			'titre' => $row['titre' ],
			'synopsys' => $row['synopsis' ],
			'avis' => $row['avis' ],
			'annee_prod' => $row['annee_prod' ],
			'titre_francais' => $row['titre_francais' ],
			'prix' => $row['prix' ],	
			'realisateur_id' => $row['num_rea'],	
			'affiche_id'=> $affiche_id		
			
			));
       		
    	}
    	var_dump("Table films migrée");



    	$listeFilm= Array();
    	foreach($dbh->query("SELECT film.num_film FROM film")	as $row) {
    		array_push($listeFilm,$row['0']);
    	}
    	
    	$listeActeur= Array();
    	foreach($dbh->query("SELECT acteur.num_acteur FROM acteur") as $row) {
    		array_push($listeActeur,$row['0']);
    	}    	

		$listeFilmSup= Array();
		for ($i=0; $i <10000 ; $i++) { 
			if(!(in_array($i,$listeFilm))){
				array_push($listeFilmSup,$i);
			}
		}

		$listeActeurSup= Array();
		for ($i=0; $i <10000 ; $i++) { 
			if(!(in_array($i,$listeActeur))){
				array_push($listeActeurSup,$i);
			}
		}

		



    	foreach($dbh->query('SELECT * FROM participer') as $row) {


    		
    		if($row['num_film']>17 
    			&& !(in_array($row['num_film'],$listeFilmSup))
    			&& $row['num_acteur']!=0 
    			&& !(in_array($row['num_acteur'],$listeActeurSup))
    			){

    			DB::table('acteur_film')->insert(array(
				'acteur_id' => $row['num_acteur'],
				'film_id' => $row['num_film']
				));
    		}
			
       		
    	}
    	var_dump("Table acteurs/films migrée");


    	foreach($dbh->query('SELECT * FROM distributeur') as $row) {


    		
			Distributeur::create(array(
				'nom' => utf8_decode($row['nom_distrib'])
			));
       		
    	}
    	var_dump("Table distributeurs migrée");


    	foreach($dbh->query('SELECT * FROM genre') as $row) {


    		//var_dump($row);
			Genre::create(array(
				'genre' => clean($row['nom_genre'])
			));
       		
    	}
    	var_dump("Table genres migrée");

    	die();


			
		
	}



}