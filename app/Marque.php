<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model {

    /**
     * Generated
     */

    protected $table = 'marque';

    protected $primaryKey = 'idMarq';
    
    protected $fillable = ['idMarq', 'nomMarq'];

    public $timestamps = false;
    
    public function modeles() {
        return $this->hasMany(\App\Modele::class, 'idMarq', 'idMarq');
    }
}