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
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('facebook_id')->nullable()->unique();
            $table->string('remember_token', 100)->nullable();
            $table->string('prenomMemb', 45)->nullable();
            $table->string('telMobMemb', 45)->nullable();
            $table->integer('sexeMemb')->nullable();
            $table->integer('anNaisMemb')->nullable();
            $table->string('pseudoMemb', 45)->nullable();
            $table->boolean('presentMemb')->nullable();
            $table->integer('prefMemb')->nullable();
            $table->boolean('casqueMemb')->nullable();
            $table->text('photoMemb')->nullable();
            $table->boolean('photoValidMemb')->nullable();
            $table->integer('nbAvisC')->nullable();
            $table->integer('nbAvisV')->nullable();
            $table->integer('totAvisC')->nullable();
            $table->integer('totAvisM')->nullable();
            $table->integer('nbInscrit')->nullable();
            $table->timestamps();
            $table->integer('idSite')->index('fk_users_site1_idx');
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
