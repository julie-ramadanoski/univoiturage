<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUniversiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('universite', function(Blueprint $table)
		{
			$table->integer('idUniv', true);
			$table->string('nomUniv', 45);
			$table->string('adr1Univ', 45);
			$table->string('adr2Univ', 45)->nullable();
			$table->string('telUniv', 45);
			$table->string('mailUniv', 45);
			$table->string('photoUniv', 45)->nullable();
			$table->string('logoUniv', 45)->nullable();
			$table->decimal('latUniv', 10, 0)->nullable();
			$table->decimal('longUniv', 10, 0)->unsigned()->nullable();
			$table->integer('inseeVille')->index('fk_universite_possede1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('universite');
	}

}
