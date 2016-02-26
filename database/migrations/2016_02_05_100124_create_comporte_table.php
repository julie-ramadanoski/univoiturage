<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComporteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comporte', function(Blueprint $table)
		{
			$table->integer('idSite')->index('fk_site_has_formation_site1_idx');
			$table->integer('idForm')->index('fk_site_has_formation_formation1_idx');
			$table->primary(['idSite','idForm']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comporte');
	}

}
