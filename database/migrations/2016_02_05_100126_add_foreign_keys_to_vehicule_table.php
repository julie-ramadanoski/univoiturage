<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiculeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicule', function(Blueprint $table)
		{
			$table->foreign('idMemb', 'fk_vehicule_membre1')->references('idMemb')->on('membre')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idMod', 'fk_vehicule_modele1')->references('idMod')->on('modele')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idType', 'fk_vehicule_type1')->references('idType')->on('type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicule', function(Blueprint $table)
		{
			$table->dropForeign('fk_vehicule_membre1');
			$table->dropForeign('fk_vehicule_modele1');
			$table->dropForeign('fk_vehicule_type1');
		});
	}

}
