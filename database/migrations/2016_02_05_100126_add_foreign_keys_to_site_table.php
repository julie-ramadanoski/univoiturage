<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('site', function(Blueprint $table)
		{
			$table->foreign('inseeVille', 'fk_site_possede1')->references('inseeVille')->on('ville')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUniv', 'fk_site_universite1')->references('idUniv')->on('universite')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('site', function(Blueprint $table)
		{
			$table->dropForeign('fk_site_possede1');
			$table->dropForeign('fk_site_universite1');
		});
	}

}
