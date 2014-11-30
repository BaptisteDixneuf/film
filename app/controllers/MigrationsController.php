

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

		foreach($dbh->query('SELECT * FROM film') as $row) {



			/*var_dump($row['num_film']);
			var_dump($row['titre']);
			var_dump(clean($row['synopsis']));
			var_dump(clean($row['avis']));
			var_dump($row['annee_prod']);			
			var_dump($row['titre']);*/


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
			'affiche_id'=> $affiche_id		
			
			));
       		
    	}
    	var_dump("Table films migrée");

    	die();


			
		
	}



}