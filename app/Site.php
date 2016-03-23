<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model {

    /**
     * Generated
     */

    protected $table = 'site';
    
    protected $primaryKey = 'idSite';

    protected $fillable = ['idSite', 'nomSite', 'adr1Site', 'adr2Site', 'idUniv', 'inseeVille'];

    public $timestamps = false;
    
    public function ville() {
        return $this->belongsTo(\App\Ville::class, 'inseeVille', 'inseeVille');
    }

    public function universite() {
        return $this->belongsTo(\App\Universite::class, 'idUniv', 'idUniv');
    }

    public function formations() {
        return $this->belongsToMany(\App\Formation::class, 'comporte', 'idSite', 'idForm');
    }

    public function comportes() {
        return $this->hasMany(\App\Comporte::class, 'idSite', 'idSite');
    }

    public function membres() {
        return $this->hasMany(\App\Membre::class, 'site_idSite', 'idSite');
    }


}
