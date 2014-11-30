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
			$table->string('pre_nom_rea');
			$table->timestamps();


		});

		for ($i=0; $i < 0; $i++) { 
			Realisateur::create([
				'pre_nom_rea'=>"Réal-Dixneuf-$i"				
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
