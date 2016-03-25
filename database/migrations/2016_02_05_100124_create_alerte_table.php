<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlerteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alerte', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('dateAlerte');
			$table->string('heureAlerte', 5);
			$table->integer('idEtapeDepartAlerte')->index('fk_alerte_etape1_idx');
			$table->integer('idEtapeArriveeAlerte')->index('fk_alerte_etape2_idx');
			$table->integer('idMemb')->index('fk_alerte_users1_idx')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alerte');
	}

}
