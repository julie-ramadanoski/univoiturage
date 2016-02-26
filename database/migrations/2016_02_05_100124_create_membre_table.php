<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membre', function(Blueprint $table)
		{
			$table->integer('idMemb', true);
			$table->string('nomMemb', 45)->nullable();
			$table->string('prenomMemb', 45)->nullable();
			$table->string('mailMemb', 45);
			$table->string('telMobMemb', 45)->nullable();
			$table->integer('sexeMemb')->nullable();
			$table->integer('anNaisMemb')->nullable();
			$table->string('pseudoMemb', 45)->nullable();
			$table->boolean('presentMemb')->nullable();
			$table->integer('prefMemb')->nullable();
			$table->boolean('casqueMemb')->nullable();
			$table->string('photoMemb', 45)->nullable();
			$table->boolean('photoValidMemb')->nullable();
			$table->integer('nbAvisC')->nullable();
			$table->integer('nbAvisV')->nullable();
			$table->integer('totAvisC')->nullable();
			$table->integer('totAvisM')->nullable();
			$table->integer('nbInscrit')->nullable();
			$table->string('mdpMemb', 256)->nullable();
			$table->integer('site_idSite')->index('fk_membre_site1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('membre');
	}

}
