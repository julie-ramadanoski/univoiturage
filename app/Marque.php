<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model {

    /**
     * Generated
     */

    protected $table = 'marque';
    protected $fillable = ['idMarq', 'nomMarq'];


    public function modeles() {
        return $this->hasMany(\App\Modele::class, 'idMarq', 'idMarq');
    }


}
