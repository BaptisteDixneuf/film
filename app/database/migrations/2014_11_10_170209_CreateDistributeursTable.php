<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributeursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distributeurs', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('nom');			
			$table->timestamps();


		});

		for ($i=0; $i < 0; $i++) { 
			Distributeur::create([
				'nom'=>"Distributeur-$i"				
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
		Schema::drop('distributeurs');
	}

}
