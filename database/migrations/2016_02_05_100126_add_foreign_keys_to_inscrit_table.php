<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInscritTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('inscrit', function(Blueprint $table)
		{
			$table->foreign('idEtapeDepartInscrit', 'fk_inscrit_etape1')->references('idEtape')->on('etape')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idEtapeArriveeInscrit', 'fk_inscrit_etape2')->references('idEtape')->on('etape')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idMemb', 'fk_users_has_trajet_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idTraj', 'fk_users_has_trajet_trajet1')->references('idTraj')->on('trajet')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('inscrit', function(Blueprint $table)
		{
			$table->dropForeign('fk_inscrit_etape1');
			$table->dropForeign('fk_inscrit_etape2');
			$table->dropForeign('fk_users_has_trajet_users1');
			$table->dropForeign('fk_users_has_trajet_trajet1');
		});
	}

}
