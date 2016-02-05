<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerte extends Model {

    /**
     * Generated
     */

    protected $table = 'alerte';
    protected $fillable = ['idAlerte', 'dateAlerte', 'heureAlerte', 'idEtapeDepartAlerte', 'idEtapeArriveeAlerte', 'idMemb'];


    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeDepartAlerte', 'idEtape');
    }

    public function etape() {
        return $this->belongsTo(\App\Etape::class, 'idEtapeArriveeAlerte', 'idEtape');
    }

    public function membre() {
        return $this->belongsTo(\App\Membre::class, 'idMemb', 'idMemb');
    }


}
