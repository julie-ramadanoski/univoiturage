<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlerteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alerte', function(Blueprint $table)
		{
			$table->foreign('idEtapeDepartAlerte', 'fk_alerte_etape1')->references('idEtape')->on('etape')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idEtapeArriveeAlerte', 'fk_alerte_etape2')->references('idEtape')->on('etape')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idMemb', 'fk_alerte_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alerte', function(Blueprint $table)
		{
			$table->dropForeign('fk_alerte_etape1');
			$table->dropForeign('fk_alerte_etape2');
			$table->dropForeign('fk_alerte_users1');
		});
	}

}
