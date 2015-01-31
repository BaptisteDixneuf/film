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
		//Relations Films-Réalisateur
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('realisateur_id')->references('id')->on('realisateurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});

		//Relations Films-Distributeur
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('distributeur_id')->references('id')->on('distributeurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});

		//Relations Films-Genre
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('genre_id')->references('id')->on('genres')
						->onDelete('restrict')
						->onUpdate('restrict');
		});

		//Relations Films-Nationalite
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('nationalite_id')->references('id')->on('nationalites')
						->onDelete('restrict')
						->onUpdate('restrict');
		});


		//Relations Films-Affiche
		Schema::table('films', function(Blueprint $table) {
			$table->foreign('affiche_id')->references('id')->on('affiches')
						->onDelete('restrict')
						->onUpdate('restrict');
		});


		//Relations Films-Acteurs
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
		//Relations Films-Réalisateur
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_realisateur_id_foreign');
		});

		//Relations Films-Distributeur
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_distributeur_id_foreign');
		});

		//Relations Films-Genre
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_genre_id_foreign');
		});

		//Relations Films-Nationalite
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_nationalite_id_foreign');
		});

		//Relations Films-Affiche
		Schema::table('films', function(Blueprint $table) {
			$table->dropForeign('films_affiche_id_foreign');
		});

		//Relations Films-Acteurs
		Schema::table('acteur_film', function(Blueprint $table) {
			$table->dropForeign('acteur_film_acteur_id_foreign');
		});
		Schema::table('acteur_film', function(Blueprint $table) {
			$table->dropForeign('acteur_film_film_id_foreign');
		});
	}

}
