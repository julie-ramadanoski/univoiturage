<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Membre extends Authenticatable {
    /**
     * Generated
     */
    protected $table = 'membre';
    protected $fillable = ['id', 'name', 'prenomMemb', 'email', 'telMobMemb', 'sexeMemb', 'anNaisMemb', 'pseudoMemb', 'presentMemb', 'prefMemb', 'casqueMemb', 'photoMemb', 'photoValidMemb', 'nbAvisC', 'nbAvisV', 'totAvisC', 'totAvisM', 'nbInscrit', 'site_idSite', 'password'];

    
    public $timestamps = false;
     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

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
    
