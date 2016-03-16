<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EtapeTrajet;

class EtapeTrajetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

		EtapeTrajet::create( [
		'idEtape'=>1,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>2,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'40',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>3,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>70,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>4,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>5,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>120,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'140',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>6,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>7,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>8,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>9,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>60,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'50',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>10,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>11,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>10,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'20',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>12,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>20,
		'prixEtapeTrajet'=>'20',
		'dureeEtapeTrajet'=>'50',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		EtapeTrajet::create( [
		'idEtape'=>13,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>4,
		'distEtapeTrajet'=>30,
		'prixEtapeTrajet'=>'10',
		'dureeEtapeTrajet'=>'20',
		'placePrisesEtapeTrajet'=>NULL
		] );

			


    }
}
