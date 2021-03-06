<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model {

    /**
     * Generated
     */

    protected $table = 'vehicule';

    protected $primaryKey = 'idVeh';
    
    protected $fillable = ['idVeh', 'photoVeh', 'confVeh', 'nbPlaceVeh', 'couleurVeh', 'defautVeh', 'idMemb', 'idMod', 'idType'];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(\App\User::class, 'id', 'idMemb');
    }

    public function modele() {
        return $this->belongsTo(\App\Modele::class, 'idMod', 'idMod');
    }

    public function type() {
        return $this->belongsTo(\App\Type::class, 'idType', 'idType');
    }

    public function trajets() {
        return $this->hasMany(\App\Trajet::class, 'idVeh', 'idVeh');
    }


}
