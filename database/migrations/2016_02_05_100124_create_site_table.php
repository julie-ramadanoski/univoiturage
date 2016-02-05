<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site', function(Blueprint $table)
		{
			$table->integer('idSite', true);
			$table->string('nomSite', 45);
			$table->string('adr1Site', 45);
			$table->string('adr2Site', 45)->nullable();
			$table->integer('idUniv')->index('fk_site_universite1_idx');
			$table->integer('inseeVille')->index('fk_site_possede1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('site');
	}

}
