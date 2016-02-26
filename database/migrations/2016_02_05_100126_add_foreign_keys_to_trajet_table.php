<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trajet', function(Blueprint $table)
		{
			$table->foreign('idMemb', 'fk_trajet_membre1')->references('idMemb')->on('membre')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idVeh', 'fk_trajet_vehicule1')->references('idVeh')->on('vehicule')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trajet', function(Blueprint $table)
		{
			$table->dropForeign('fk_trajet_membre1');
			$table->dropForeign('fk_trajet_vehicule1');
		});
	}

}
