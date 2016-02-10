<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEtapetrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('etapetrajet', function(Blueprint $table)
		{
			$table->foreign('idEtape', 'fk_etape_has_trajet_etape1')->references('idEtape')->on('etape')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idTraj', 'fk_etape_has_trajet_trajet1')->references('idTraj')->on('trajet')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('etapetrajet', function(Blueprint $table)
		{
			$table->dropForeign('fk_etape_has_trajet_etape1');
			$table->dropForeign('fk_etape_has_trajet_trajet1');
		});
	}

}
