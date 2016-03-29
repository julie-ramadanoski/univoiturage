<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Etapetrajet;

class EtapeTrajetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

		Etapetrajet::create( [
		'idEtape'=>1,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>2,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'40',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>3,
		'idTraj'=>1,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>70,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>4,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>5,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>120,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'140',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>6,
		'idTraj'=>2,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>7,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>8,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>50,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'70',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>9,
		'idTraj'=>3,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>60,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'50',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>10,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>1,
		'distEtapeTrajet'=>0,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'0',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>11,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>2,
		'distEtapeTrajet'=>10,
		'prixEtapeTrajet'=>'0',
		'dureeEtapeTrajet'=>'20',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>12,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>3,
		'distEtapeTrajet'=>20,
		'prixEtapeTrajet'=>'20',
		'dureeEtapeTrajet'=>'50',
		'placePrisesEtapeTrajet'=>NULL
		] );

					

		Etapetrajet::create( [
		'idEtape'=>13,
		'idTraj'=>4,
		'numOrdreEtapeTrajet'=>4,
		'distEtapeTrajet'=>30,
		'prixEtapeTrajet'=>'10',
		'dureeEtapeTrajet'=>'20',
		'placePrisesEtapeTrajet'=>NULL
		] );

		Etapetrajet::create( ['idEtape'=>14, 'idTraj'=>5, 'numOrdreEtapeTrajet'=>1,	'distEtapeTrajet'=>0, 'prixEtapeTrajet'=>'0', 'dureeEtapeTrajet'=>'0', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>15, 'idTraj'=>5, 'numOrdreEtapeTrajet'=>2,	'distEtapeTrajet'=>30, 'prixEtapeTrajet'=>'5', 'dureeEtapeTrajet'=>'20', 'placePrisesEtapeTrajet'=>1] );
		Etapetrajet::create( ['idEtape'=>16, 'idTraj'=>5, 'numOrdreEtapeTrajet'=>3,	'distEtapeTrajet'=>120, 'prixEtapeTrajet'=>'20', 'dureeEtapeTrajet'=>'90', 'placePrisesEtapeTrajet'=>1] );
		
		Etapetrajet::create( ['idEtape'=>17, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>1,	'distEtapeTrajet'=>0, 'prixEtapeTrajet'=>'0', 'dureeEtapeTrajet'=>'0', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>18, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>2,	'distEtapeTrajet'=>70, 'prixEtapeTrajet'=>'15', 'dureeEtapeTrajet'=>'50', 'placePrisesEtapeTrajet'=>1] );
		Etapetrajet::create( ['idEtape'=>19, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>3,	'distEtapeTrajet'=>20, 'prixEtapeTrajet'=>'7', 'dureeEtapeTrajet'=>'15', 'placePrisesEtapeTrajet'=>2] );
		Etapetrajet::create( ['idEtape'=>20, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>4,	'distEtapeTrajet'=>20, 'prixEtapeTrajet'=>'7', 'dureeEtapeTrajet'=>'15', 'placePrisesEtapeTrajet'=>2] );
		Etapetrajet::create( ['idEtape'=>21, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>5,	'distEtapeTrajet'=>20, 'prixEtapeTrajet'=>'7', 'dureeEtapeTrajet'=>'15', 'placePrisesEtapeTrajet'=>3] );
		Etapetrajet::create( ['idEtape'=>22, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>6,	'distEtapeTrajet'=>80, 'prixEtapeTrajet'=>'15', 'dureeEtapeTrajet'=>'15', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>23, 'idTraj'=>6, 'numOrdreEtapeTrajet'=>7,	'distEtapeTrajet'=>40, 'prixEtapeTrajet'=>'10', 'dureeEtapeTrajet'=>'15', 'placePrisesEtapeTrajet'=>2] );
		
		Etapetrajet::create( ['idEtape'=>24, 'idTraj'=>7, 'numOrdreEtapeTrajet'=>1,	'distEtapeTrajet'=>0, 'prixEtapeTrajet'=>'0', 'dureeEtapeTrajet'=>'0', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>25, 'idTraj'=>7, 'numOrdreEtapeTrajet'=>2,	'distEtapeTrajet'=>80, 'prixEtapeTrajet'=>'15', 'dureeEtapeTrajet'=>'80', 'placePrisesEtapeTrajet'=>1] );
		Etapetrajet::create( ['idEtape'=>26, 'idTraj'=>7, 'numOrdreEtapeTrajet'=>3,	'distEtapeTrajet'=>40, 'prixEtapeTrajet'=>'5', 'dureeEtapeTrajet'=>'35', 'placePrisesEtapeTrajet'=>0] );
		
		Etapetrajet::create( ['idEtape'=>27, 'idTraj'=>8, 'numOrdreEtapeTrajet'=>1,	'distEtapeTrajet'=>0, 'prixEtapeTrajet'=>'0', 'dureeEtapeTrajet'=>'0', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>28, 'idTraj'=>8, 'numOrdreEtapeTrajet'=>2,	'distEtapeTrajet'=>120, 'prixEtapeTrajet'=>'25', 'dureeEtapeTrajet'=>'200', 'placePrisesEtapeTrajet'=>0] );
		Etapetrajet::create( ['idEtape'=>29, 'idTraj'=>8, 'numOrdreEtapeTrajet'=>3,	'distEtapeTrajet'=>30, 'prixEtapeTrajet'=>'7', 'dureeEtapeTrajet'=>'30', 'placePrisesEtapeTrajet'=>1] );

			


    }
}
