<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model {

    /**
     * Generated
     */

    protected $table = 'inscrit';
    protected $fillable = ['idMemb', 'idTraj', 'avisCInscrit', 'commentaireCInscrit', 'dateCommentCInscrit', 'avisVInscrit', 'commentaireVInscrit', 'dateCommentVInscrit', 'valideInscrit', 'idEtapeDepartInscrit', 'idEtapeArriveeInscrit'];

    public $timestamps = false;
    
    public function etapeDepart() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeDepartInscrit', 'idEtape');
    }

    public function etapeArrivee() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeArriveeInscrit', 'idEtape');
    }

    public function user() {
        return $this->belongsTo(\App\User::class, 'idMemb', 'id');
    }

    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
