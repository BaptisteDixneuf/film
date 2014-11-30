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
			$table->string('pre_nom_acteur');
			$table->timestamps();


		});

		for ($i=0; $i < 0; $i++) { 
			Acteur::create([
				'pre_nom_acteur'=>"Dixneuf-$i"
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
