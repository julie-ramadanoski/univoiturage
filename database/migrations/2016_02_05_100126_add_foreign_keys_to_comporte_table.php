<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToComporteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comporte', function(Blueprint $table)
		{
			$table->foreign('idForm', 'fk_site_has_formation_formation1')->references('idForm')->on('formation')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idSite', 'fk_site_has_formation_site1')->references('idSite')->on('site')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comporte', function(Blueprint $table)
		{
			$table->dropForeign('fk_site_has_formation_formation1');
			$table->dropForeign('fk_site_has_formation_site1');
		});
	}

}
