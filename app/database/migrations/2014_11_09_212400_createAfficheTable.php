<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfficheTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiches', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');			
			$table->timestamps();


		});

		for ($i=0; $i < 0; $i++) { 
			Affiche::create([
				'image'=>"image-$i",
				
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
		Schema::drop('affiches');
	}

}
