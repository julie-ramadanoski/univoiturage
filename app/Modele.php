<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model {

    /**
     * Generated
     */

    protected $table = 'modele';

    protected $primaryKey = 'idMod';

    protected $fillable = ['idMod', 'nomMod', 'idMarq'];

    public $timestamps = false;
    
    public function marque() {
        return $this->belongsTo(\App\Marque::class, 'idMarq', 'idMarq');
    }

    public function vehicules() {
        return $this->hasMany(\App\Vehicule::class, 'idMod', 'idMod');
    }


}
