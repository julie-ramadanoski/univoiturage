<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EtapeTrajet extends Model {

    /**
     * Generated
     */

    protected $table = 'etapetrajet';
    protected $fillable = ['idEtape', 'idTraj', 'numOrdreEtapeTrajet', 'distEtapeTrajet', 'prixEtapeTrajet', 'dureeEtapeTrajet', 'placePrisesEtapeTrajet'];

    public $timestamps = false;
    
    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtape', 'idEtape');
    }

    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
