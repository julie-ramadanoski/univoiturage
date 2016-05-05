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
        Inscrit::create(['idMemb' => '3','idTraj' => '2','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '0','idEtapeDepartInscrit' => '4','idEtapeArriveeInscrit' => '6'] );

        Inscrit::create(['idMemb' => '1','idTraj' => '3','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '0','idEtapeDepartInscrit' => '7','idEtapeArriveeInscrit' => '8'] );

        Inscrit::create(['idMemb' => '1','idTraj' => '4','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '0','idEtapeDepartInscrit' => '10','idEtapeArriveeInscrit' => '13'] );

        Inscrit::create(['idMemb' => '2','idTraj' => '5','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '14','idEtapeArriveeInscrit' => '16'] );
        Inscrit::create(['idMemb' => '3','idTraj' => '5','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '14','idEtapeArriveeInscrit' => '15'] );

        Inscrit::create(['idMemb' => '3','idTraj' => '6','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '19','idEtapeArriveeInscrit' => '23'] );

        Inscrit::create(['idMemb' => '1','idTraj' => '7','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '24','idEtapeArriveeInscrit' => '26'] );

        Inscrit::create(['idMemb' => '3','idTraj' => '8','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '27','idEtapeArriveeInscrit' => '29'] );

        Inscrit::create(['idMemb' => '1','idTraj' => '9','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '24','idEtapeArriveeInscrit' => '25'] );
        Inscrit::create(['idMemb' => '2','idTraj' => '9','avisCInscrit' => NULL,'commentaireCInscrit' => NULL,'dateCommentCInscrit' => NULL,'avisVInscrit' => NULL,'commentaireVInscrit' => NULL,'dateCommentVInscrit' => NULL,'valideInscrit' => '1','idEtapeDepartInscrit' => '25','idEtapeArriveeInscrit' => '26'] );
    }
}