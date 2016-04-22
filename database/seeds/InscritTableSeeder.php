<?php

use Illuminate\Database\Seeder;
use App\Inscrit;

class InscritTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscrit::create(['idMemb' => '1','idTraj' => '6','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '0','idEtapeDepartInscrit' => '17','idEtapeArriveeInscrit' => '23'] );
          Inscrit::create(['idMemb' => '1','idTraj' => '7','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '0','idEtapeDepartInscrit' => '24','idEtapeArriveeInscrit' => '25'] );
    }
}
