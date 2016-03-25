<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model {

    /**
     * Generated
     */


    protected $table = 'etape';

    protected $primaryKey = 'idEtape';
    
    protected $fillable = ['idEtape', 'adresseEtape', 'inseeVille'];

    public $timestamps = false;
    
    public function ville() {
        return $this->belongsTo(\App\Ville::class, 'inseeVille', 'inseeVille');
    }

    public function trajets() {
        return $this->belongsToMany(\App\Trajet::class, 'etapetrajet', 'idEtape', 'idTraj');
    }

    public function alertesDepart() {
        return $this->hasMany(\App\Alerte::class, 'idEtapeDepartAlerte', 'idEtape');
    }

    public function alertesArrivee() {
        return $this->hasMany(\App\Alerte::class, 'idEtapeArriveeAlerte', 'idEtape');
    }

    public function etapetrajets() {
        return $this->hasMany(\App\Etapetrajet::class, 'idEtape', 'idEtape');
    }

    public function inscritsDepart() {
        return $this->hasMany(\App\Inscrit::class, 'idEtapeDepartInscrit', 'idEtape');
    }

    public function inscritsArrivee() {
        return $this->hasMany(\App\Inscrit::class, 'idEtapeArriveeInscrit', 'idEtape');
    }


}
