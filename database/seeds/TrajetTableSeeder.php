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
        Trajet::create(['idTraj' => '1','dateTraj' => '2016-04-30','heureTraj' => '20h40','nbPlacesTraj' => '3','tarifTraj' => '4','autoRoutTraj' => '0','detoursTraj' => '5','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => NULL,'distTraj' => '50','dureeTraj' => '60','idMemb' => '1','idVeh' => '1','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "26362/26235/13001"] );
  Trajet::create(['idTraj' => '2','dateTraj' => '2016-04-30','heureTraj' => '22h00','nbPlacesTraj' => '1','tarifTraj' => '0','autoRoutTraj' => '0','detoursTraj' => '10','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => NULL,'distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '2','idVeh' => '2','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/13001/13055"] );
  Trajet::create(['idTraj' => '3','dateTraj' => '2016-04-30','heureTraj' => '08h30','nbPlacesTraj' => '4','tarifTraj' => '0','autoRoutTraj' => '1','detoursTraj' => '0','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => NULL,'distTraj' => '120','dureeTraj' => '150','idMemb' => '1','idVeh' => '1','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "13055/13001/26362"] );
  Trajet::create(['idTraj' => '4','dateTraj' => '2016-04-30','heureTraj' => '10h45','nbPlacesTraj' => '1','tarifTraj' => '60','autoRoutTraj' => '1','detoursTraj' => '10','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => NULL,'distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '2','idVeh' => '2','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/26362/26235/13001"] );
  Trajet::create(['idTraj' => '5','dateTraj' => '2016-04-30','heureTraj' => '8h55','nbPlacesTraj' => '1','tarifTraj' => '15','autoRoutTraj' => '0','detoursTraj' => '5','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => 'Par le col de Cabre','distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '1','idVeh' => '1','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/5179/84150"] );
  Trajet::create(['idTraj' => '6','dateTraj' => '2016-04-30','heureTraj' => '18h00','nbPlacesTraj' => '5','tarifTraj' => '70','autoRoutTraj' => '1','detoursTraj' => '5','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => 'Road trip','distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '2','idVeh' => '2','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "38185/26281/26362/26198/84019/13001/13055"] );
  Trajet::create(['idTraj' => '7','dateTraj' => '2016-04-30','heureTraj' => '15h30','nbPlacesTraj' => '4','tarifTraj' => '10','autoRoutTraj' => '1','detoursTraj' => '10','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => 'Road trip','distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '3','idVeh' => '3','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/13001/13055"] );
  Trajet::create(['idTraj' => '8','dateTraj' => '2016-04-30','heureTraj' => '9h15','nbPlacesTraj' => '1','tarifTraj' => '20','autoRoutTraj' => '1','detoursTraj' => '10','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => 'Road trip','distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '4','idVeh' => '4','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/13055/13028"] );
  Trajet::create(['idTraj' => '9','dateTraj' => '2016-04-30','heureTraj' => '5h30','nbPlacesTraj' => '3','tarifTraj' => '10','autoRoutTraj' => '1','detoursTraj' => '5','depaDecTraj' => NULL,'bagageTraj' => NULL,'infoTraj' => 'Mon super voyage','distTraj' => NULL,'dureeTraj' => NULL,'idMemb' => '6','idVeh' => '3','listeDistEtapeTrajet' => NULL,'listeInseeEtapeTrajet' => "5061/13001/13055"] );

    }
}

