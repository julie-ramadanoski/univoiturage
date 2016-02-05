<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model {

    /**
     * Generated
     */

    protected $table = 'membre';
    protected $fillable = ['idMemb', 'nomMemb', 'prenomMemb', 'mailMemb', 'telMobMemb', 'sexeMemb', 'anNaisMemb', 'pseudoMemb', 'presentMemb', 'prefMemb', 'casqueMemb', 'photoMemb', 'photoValidMemb', 'nbAvisC', 'nbAvisV', 'totAvisC', 'totAvisM', 'nbInscrit', 'mdpMemb', 'site_idSite'];


    public function site() {
        return $this->belongsTo(\App\Site::class, 'site_idSite', 'idSite');
    }

    public function alertes() {
        return $this->hasMany(\App\Alerte::class, 'idMemb', 'idMemb');
    }

    public function inscrits() {
        return $this->hasMany(\App\Inscrit::class, 'idMemb', 'idMemb');
    }

    public function trajets() {
        return $this->hasMany(\App\Trajet::class, 'idMemb', 'idMemb');
    }

    public function vehicules() {
        return $this->hasMany(\App\Vehicule::class, 'idMemb', 'idMemb');
    }


}
