<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('realisateur_id')->references('id')->on('realisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});

		Schema::table('acteur_film', function(Blueprint $table) {
			$table->foreign('acteur_id')->references('id')->on('acteurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('acteur_film', function(Blueprint $table) {
			$table->foreign('film_id')->references('id')->on('films')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_realisateur_id_foreign');
		});

		Schema::table('acteur_film', function(Blueprint $table) {
			$table->dropForeign('acteur_film_acteur_id_foreign');
		});
		Schema::table('acteur_film', function(Blueprint $table) {
			$table->dropForeign('acteur_film_film_id_foreign');
		});
	}

}
