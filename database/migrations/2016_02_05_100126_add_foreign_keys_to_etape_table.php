<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEtapeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('etape', function(Blueprint $table)
		{
			$table->foreign('inseeVille', 'fk_etape_possede1')->references('inseeVille')->on('ville')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('etape', function(Blueprint $table)
		{
			$table->dropForeign('fk_etape_possede1');
		});
	}

}
