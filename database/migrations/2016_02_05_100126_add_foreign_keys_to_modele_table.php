<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToModeleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('modele', function(Blueprint $table)
		{
			$table->foreign('idMarq', 'fk_modele_marque1')->references('idMarq')->on('marque')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('modele', function(Blueprint $table)
		{
			$table->dropForeign('fk_modele_marque1');
		});
	}

}
