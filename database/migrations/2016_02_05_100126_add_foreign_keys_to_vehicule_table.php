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
			$table->foreign('idMemb', 'fk_vehicule_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idMod', 'fk_vehicule_modele1')->references('idMod')->on('modele')->onUpdate('set null')->onDelete('set null');
			$table->foreign('idType', 'fk_vehicule_type1')->references('idType')->on('type')->onUpdate('cascade')->onDelete('cascade');
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
			$table->dropForeign('fk_vehicule_users1');
			$table->dropForeign('fk_vehicule_modele1');
			$table->dropForeign('fk_vehicule_type1');
		});
	}

}
