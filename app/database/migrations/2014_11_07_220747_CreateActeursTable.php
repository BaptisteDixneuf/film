<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActeursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acteurs', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('nom');
			$table->string('prenom');
			$table->longtext('biographie');
			$table->timestamps();


		});

		for ($i=0; $i < 100; $i++) { 
			Acteur::create([
				'nom'=>"Dixneuf-$i",
				'prenom'=>"Baptiste-$i",
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
		Schema::drop('acteurs');
	}

}
