<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ModeleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Modele::create( [
		'idMod'=>1,
		'nomMod'=>'clio',
		'idMarq'=>1
		] );
    }
}
