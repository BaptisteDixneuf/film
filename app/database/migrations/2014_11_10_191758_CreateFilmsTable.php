<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('films', function (Blueprint $table){
			$table->increments('id');
			$table->string('titre');		
			$table->longtext('synopsys');	
			$table->longtext('avis');	
			$table->mediumInteger('annee_prod'); //ANNEE
			$table->string('titre_francais')->nullable();; 
			$table->longtext('prix')->nullable();; 
			$table->integer('realisateur_id')->unsigned()->nullable();
			$table->integer('distributeur_id')->unsigned()->nullable();
			$table->integer('genre_id')->unsigned()->nullable();
			$table->integer('affiche_id')->unsigned(); // Obligatoire relation 1 à 1
			$table->timestamps();
		});

		for ($i=0; $i < 0; $i++) { 
			Film::create([
				'titre'=>"Titre-Film-$i",
				'synopsys'=>"Au début des années 1980, en Allemagne de l'Est, un agent secret, nommé Wiesler, a pour mission d'observer un couple d'intellectuels. Ces derniers vont le fasciner de plus en plus...",
				'avis'=>"Bonne aprroche des méfaits d'une police politique. Quelques longueurs.",
				'annee_prod'=>'2014',
				'titre_francais'=>'',
				'prix'=>'prix International du film',
				'affiche_id'=>'1'
				]);
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('films');
	}

}
