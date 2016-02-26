<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMembreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('membre', function(Blueprint $table)
		{
			$table->foreign('site_idSite', 'fk_membre_site1')->references('idSite')->on('site')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('membre', function(Blueprint $table)
		{
			$table->dropForeign('fk_membre_site1');
		});
	}

}
