<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtapetrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etapetrajet', function(Blueprint $table)
		{
			$table->integer('idEtape')->index('fk_etape_has_trajet_etape1_idx');
			$table->integer('idTraj')->index('fk_etape_has_trajet_trajet1_idx');
			$table->integer('numOrdreEtapeTrajet');
			$table->integer('distEtapeTrajet');
			$table->decimal('prixEtapeTrajet', 10, 0);
			$table->string('dureeEtapeTrajet', 5);
			$table->integer('placePrisesEtapeTrajet')->nullable();
			$table->primary(['idEtape','idTraj']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etapetrajet');
	}

}
