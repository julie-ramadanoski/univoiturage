<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comporte extends Model {

    /**
     * Generated
     */

    protected $table = 'comporte';
    protected $fillable = ['idSite', 'idForm'];


    public function formation() {
        return $this->belongsTo(\App\Formation::class, 'idForm', 'idForm');
    }

    public function site() {
        return $this->belongsTo(\App\Site::class, 'idSite', 'idSite');
    }


}
