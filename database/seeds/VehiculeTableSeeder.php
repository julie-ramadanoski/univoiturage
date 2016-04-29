<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Vehicule;


class VehiculeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

		Vehicule::create( [
		'idVeh'=>1,
		'photoVeh'=>NULL,
		'confVeh'=>2,
		'nbPlaceVeh'=>4,
		'couleurVeh'=>'blanche',
		'defautVeh'=>1,
		'idMemb'=>1,
		'idMod'=>1,
		'idType'=>1
		] );

		Vehicule::create( [
		'idVeh'=>2,
		'photoVeh'=>NULL,
		'confVeh'=>3,
		'nbPlaceVeh'=>1,
		'couleurVeh'=>'bleu nuit',
		'defautVeh'=>1,
		'idMemb'=>2,
		'idMod'=>1,
		'idType'=>1
		] );

		Vehicule::create( [
		'idVeh'=>3,
		'photoVeh'=>NULL,
		'confVeh'=>1,
		'nbPlaceVeh'=>4,
		'couleurVeh'=>'verte pomme',
		'defautVeh'=>1,
		'idMemb'=>3,
		'idMod'=>1,
		'idType'=>1
		] );
		
		Vehicule::create( [
		'idVeh'=>4,
		'photoVeh'=>NULL,
		'confVeh'=>2,
		'nbPlaceVeh'=>1,
		'couleurVeh'=>'rouge',
		'defautVeh'=>1,
		'idMemb'=>4,
		'idMod'=>2,
		'idType'=>2 
		] );



    }
}
