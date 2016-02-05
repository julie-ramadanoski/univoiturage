<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscritTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inscrit', function(Blueprint $table)
		{
			$table->integer('idMemb')->index('fk_membre_has_trajet_membre1_idx');
			$table->integer('idTraj')->index('fk_membre_has_trajet_trajet1_idx');
			$table->integer('avisCInscrit')->nullable();
			$table->string('commentaireCInscrit')->nullable();
			$table->date('dateCommentCInscrit')->nullable();
			$table->integer('avisVInscrit')->nullable();
			$table->string('commentaireVInscrit')->nullable();
			$table->date('dateCommentVInscrit')->nullable();
			$table->boolean('valideInscrit')->default(0);
			$table->integer('idEtapeDepartInscrit')->index('fk_inscrit_etape1_idx');
			$table->integer('idEtapeArriveeInscrit')->index('fk_inscrit_etape2_idx');
			$table->primary(['idMemb','idTraj']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inscrit');
	}

}
