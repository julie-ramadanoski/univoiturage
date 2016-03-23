<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['id', 'name', 'prenomMemb', 'email', 'telMobMemb', 'sexeMemb', 'anNaisMemb', 'pseudoMemb', 'presentMemb', 'prefMemb', 'casqueMemb', 'photoMemb', 'photoValidMemb', 'nbAvisC', 'nbAvisV', 'totAvisC', 'totAvisM', 'nbInscrit', 'idSite', 'password'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function site() {
        return $this->belongsTo(\App\Site::class, 'idSite', 'idSite');
    }

    public function alertes() {
        return $this->hasMany(\App\Alerte::class, 'idMemb', 'id');
    }

    public function inscrits() {
        return $this->hasMany(\App\Inscrit::class, 'idMemb', 'id');
    }

    public function trajets() {
        return $this->hasMany(\App\Trajet::class, 'idMemb', 'id');
    }

    public function vehicules() {
        return $this->hasMany(\App\Vehicule::class, 'idMemb', 'id');
    }

}