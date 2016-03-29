<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Trajet;


class TrajetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trajet::create( [
		'idTraj'=>1,
		'dateTraj'=>'2016-03-29',
		'heureTraj'=>'20h',
		'nbPlacesTraj'=>3,
		'tarifTraj'=>'4',
		'autoRoutTraj'=>0,
		'detoursTraj'=>5,
		'depaDecTraj'=>NULL,
		'bagageTraj'=>NULL,
		'infoTraj'=>NULL,
		'distTraj'=>50,
		'dureeTraj'=>'60',
		'idMemb'=>1,
		'idVeh'=>1,
		'listeInseeEtapeTrajet'=>NULL,
		'listeDistEtapeTrajet'=>NULL
		] );

					

		Trajet::create( [
		'idTraj'=>2,
		'dateTraj'=>'2016-03-29',
		'heureTraj'=>'22h',
		'nbPlacesTraj'=>1,
		'tarifTraj'=>'0',
		'autoRoutTraj'=>0,
		'detoursTraj'=>10,
		'depaDecTraj'=>NULL,
		'bagageTraj'=>NULL,
		'infoTraj'=>NULL,
		'distTraj'=>NULL,
		'dureeTraj'=>NULL,
		'idMemb'=>2,
		'idVeh'=>2,
		'listeInseeEtapeTrajet'=>NULL,
		'listeDistEtapeTrajet'=>NULL
		] );

					

		Trajet::create( [
		'idTraj'=>3,
		'dateTraj'=>'2016-03-29',
		'heureTraj'=>'08h',
		'nbPlacesTraj'=>4,
		'tarifTraj'=>'0',
		'autoRoutTraj'=>1,
		'detoursTraj'=>0,
		'depaDecTraj'=>NULL,
		'bagageTraj'=>NULL,
		'infoTraj'=>NULL,
		'distTraj'=>120,
		'dureeTraj'=>'150',
		'idMemb'=>1,
		'idVeh'=>1,
		'listeInseeEtapeTrajet'=>NULL,
		'listeDistEtapeTrajet'=>NULL
		] );

					

		Trajet::create( [
		'idTraj'=>4,
		'dateTraj'=>'2016-03-30',
		'heureTraj'=>'10',
		'nbPlacesTraj'=>1,
		'tarifTraj'=>'60',
		'autoRoutTraj'=>1,
		'detoursTraj'=>10,
		'depaDecTraj'=>NULL,
		'bagageTraj'=>NULL,
		'infoTraj'=>NULL,
		'distTraj'=>NULL,
		'dureeTraj'=>NULL,
		'idMemb'=>2,
		'idVeh'=>2,
		'listeInseeEtapeTrajet'=>NULL,
		'listeDistEtapeTrajet'=>NULL
		] );
    }
}
