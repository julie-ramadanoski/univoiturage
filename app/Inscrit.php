<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model {

    /**
     * Generated
     */

    protected $table = 'inscrit';
    protected $fillable = ['idMemb', 'idTraj', 'avisCInscrit', 'commentaireCInscrit', 'dateCommentCInscrit', 'avisVInscrit', 'commentaireVInscrit', 'dateCommentVInscrit', 'valideInscrit', 'idEtapeDepartInscrit', 'idEtapeArriveeInscrit'];


    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeDepartInscrit', 'idEtape');
    }

    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeArriveeInscrit', 'idEtape');
    }

    public function membre() {
        return $this->belongsTo(\App\Membre::class, 'idMemb', 'idMemb');
    }

    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
