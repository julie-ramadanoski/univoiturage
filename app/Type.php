<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    /**
     * Generated
     */

    protected $table = 'type';

    protected $primaryKey = 'idType';
    
    protected $fillable = ['idType', 'libType'];

    public $timestamps = false;
    
    public function vehicules() {
        return $this->hasMany(\App\Vehicule::class, 'idType', 'idType');
    }


}
