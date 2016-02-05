<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model {

    /**
     * Generated
     */

    protected $table = 'universite';
    protected $fillable = ['idUniv', 'nomUniv', 'adr1Univ', 'adr2Univ', 'telUniv', 'mailUniv', 'photoUniv', 'logoUniv', 'latUniv', 'longUniv', 'inseeVille'];


    public function ville() {
        return $this->belongsTo(\App\Ville::class, 'inseeVille', 'inseeVille');
    }

    public function sites() {
        return $this->hasMany(\App\Site::class, 'idUniv', 'idUniv');
    }


}
