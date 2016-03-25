<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trajet', function(Blueprint $table)
		{
			$table->integer('idTraj', true);
			$table->date('dateTraj');
			$table->string('heureTraj', 5);
			$table->integer('nbPlacesTraj')->nullable();
			$table->decimal('tarifTraj', 10, 0)->nullable();
			$table->boolean('autoRoutTraj');
			$table->integer('detoursTraj')->nullable();
			$table->integer('depaDecTraj')->nullable();
			$table->string('bagageTraj', 1)->nullable();
			$table->text('infoTraj')->nullable();
			$table->integer('distTraj')->nullable();
			$table->string('dureeTraj', 5)->nullable();
			$table->integer('idMemb')->index('fk_trajet_users1_idx')->unsigned();
			$table->integer('idVeh')->index('fk_trajet_vehicule1_idx')->nullable();
			$table->string('listeInseeEtapeTrajet')->nullable();
			$table->string('listeDistEtapeTrajet', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trajet');
	}

}
