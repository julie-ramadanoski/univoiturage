<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comporte extends Model {

    /**
     * Generated
     */

    protected $table = 'comporte';
        
    protected $primaryKey = 'idSite';

    protected $fillable = ['idSite', 'idForm'];

    public $timestamps = false;
    
    public function formation() {
        return $this->belongsTo(\App\Formation::class, 'idForm', 'idForm');
    }

    public function site() {
        return $this->belongsTo(\App\Site::class, 'idSite', 'idSite');
    }


}
