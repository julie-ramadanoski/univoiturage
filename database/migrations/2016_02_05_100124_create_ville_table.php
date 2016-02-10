<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVilleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ville', function(Blueprint $table)
		{
			$table->integer('inseeVille')->primary();
			$table->string('codePostalVille', 10);
			$table->string('nomVille', 45);
			$table->string('latitudeVille', 45)->nullable();
			$table->string('longitudeVille', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ville');
	}

}
