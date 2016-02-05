<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model {

    /**
     * Generated
     */

    protected $table = 'formation';
    protected $fillable = ['idForm', 'nomForm'];


    public function sites() {
        return $this->belongsToMany(\App\Site::class, 'comporte', 'idForm', 'idSite');
    }

    public function comportes() {
        return $this->hasMany(\App\Comporte::class, 'idForm', 'idForm');
    }


}
