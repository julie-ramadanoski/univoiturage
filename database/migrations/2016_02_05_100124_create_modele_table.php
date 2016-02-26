<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModeleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modele', function(Blueprint $table)
		{
			$table->integer('idMod', true);
			$table->string('nomMod', 45);
			$table->integer('idMarq')->index('fk_modele_marque1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modele');
	}

}
