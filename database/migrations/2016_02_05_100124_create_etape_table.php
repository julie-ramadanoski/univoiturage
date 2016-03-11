<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtapeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etape', function(Blueprint $table)
		{
			$table->integer('idEtape', true);
			$table->string('adresseEtape')->nullable();
			$table->integer('inseeVille')->index('fk_etape_possede1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etape');
	}

}
