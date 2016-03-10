<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_id')->nullable()->unique();
            $table->string('name');
            $table->string('prenomMemb', 45)->nullable();
            $table->string('email')->unique();
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
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::drop('users');
    }
}
