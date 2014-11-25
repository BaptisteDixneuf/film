<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genres', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('genre');			
			$table->timestamps();


		});

		for ($i=0; $i < 100; $i++) { 
			Genre::create([
				'genre'=>"Genre-$i"				
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
		Schema::drop('genres');
	}

}
