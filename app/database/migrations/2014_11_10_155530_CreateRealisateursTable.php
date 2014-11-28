<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('realisateurs', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('nom');
			$table->string('prenom');
			$table->longtext('biographie');
			$table->timestamps();


		});

		for ($i=0; $i < 3; $i++) { 
			Realisateur::create([
				'nom'=>"Réal-Dixneuf-$i",
				'prenom'=>"Réal-Baptiste-$i",
				'biographie'=>"Loremp iqdqsfdfb fbdsfbdfb dsfbdifh"
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
		Schema::drop('realisateurs');
	}

}
