<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerte extends Model {

    /**
     * Generated
     */

    protected $table = 'alerte';
    protected $fillable = ['idAlerte', 'dateAlerte', 'heureAlerte', 'idEtapeDepartAlerte', 'idEtapeArriveeAlerte', 'idMemb'];


    public function etapeDepart() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeDepartAlerte', 'idEtape');
    }

    public function etapeArrivee() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeArriveeAlerte', 'idEtape');
    }

    public function membre() {
        return $this->belongsTo(\App\Membre::class, 'idMemb', 'idMemb');
    }


}
