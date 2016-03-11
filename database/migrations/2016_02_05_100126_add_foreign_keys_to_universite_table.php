<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUniversiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('universite', function(Blueprint $table)
		{
			$table->foreign('inseeVille', 'fk_universite_possede1')->references('inseeVille')->on('ville')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('universite', function(Blueprint $table)
		{
			$table->dropForeign('fk_universite_possede1');
		});
	}

}
