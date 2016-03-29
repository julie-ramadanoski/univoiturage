<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiculeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicule', function(Blueprint $table)
		{
			$table->integer('idVeh', true);
			$table->string('photoVeh', 45)->nullable();
			$table->integer('confVeh')->nullable();
			$table->integer('nbPlaceVeh');
			$table->string('couleurVeh', 45)->nullable();
			$table->boolean('defautVeh');
			$table->integer('idMemb')->index('fk_vehicule_users1_idx')->unsigned();
			$table->integer('idMod')->index('fk_vehicule_modele1_idx')->nullable();
			$table->integer('idType')->index('fk_vehicule_type1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicule');
	}

}
