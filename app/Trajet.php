<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    /**
     * Generated
     */

    protected $table = 'trajet';
    protected $fillable = ['idTraj', 'dateTraj', 'heureTraj', 'nbPlacesTraj', 'tarifTraj', 'autoRoutTraj', 'detoursTraj', 'depaDecTraj', 'bagageTraj', 'infoTraj', 'distTraj', 'dureeTraj', 'idMemb', 'idVeh', 'listeInseeEtapeTrajet', 'listeDistEtapeTrajet'];


    public function membre() {
        return $this->belongsTo(\App\Membre::class, 'idMemb', 'idMemb');
    }

    public function vehicule() {
        return $this->belongsTo(\App\Vehicule::class, 'idVeh', 'idVeh');
    }

    public function etapes() {
        return $this->belongsToMany(\App\Etape::class, 'etapetrajet', 'idTraj', 'idEtape');
    }

    public function etapetrajets() {
        return $this->hasMany(\App\Etapetrajet::class, 'idTraj', 'idTraj');
    }

    public function inscrits() {
        return $this->hasMany(\App\Inscrit::class, 'idTraj', 'idTraj');
    }

    public function questions() {
        return $this->hasMany(\App\Question::class, 'idTraj', 'idTraj');
    }


}
