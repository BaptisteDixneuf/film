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
			$table->integer('nationalite_id')->unsigned()->nullable();
			$table->integer('affiche_id')->unsigned(); // Obligatoire relation 1 à 1
			$table->timestamps();
		});
		
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
