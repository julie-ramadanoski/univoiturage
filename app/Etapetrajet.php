<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapetrajet extends Model {

    /**
     * Generated
     */

    protected $table = 'etapetrajet';
    protected $fillable = ['idEtape', 'idTraj', 'numOrdreEtapeTrajet', 'distEtapeTrajet', 'prixEtapeTrajet', 'dureeEtapeTrajet', 'placePrisesEtapeTrajet'];


    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtape', 'idEtape');
    }

    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
