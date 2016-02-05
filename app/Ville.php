<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

    /**
     * Generated
     */

    protected $table = 'ville';
    protected $fillable = ['inseeVille', 'codePostalVille', 'nomVille', 'latitudeVille', 'longitudeVille'];


    public function etapes() {
        return $this->hasMany(\App\Etape::class, 'inseeVille', 'inseeVille');
    }

    public function sites() {
        return $this->hasMany(\App\Site::class, 'inseeVille', 'inseeVille');
    }

    public function universites() {
        return $this->hasMany(\App\Universite::class, 'inseeVille', 'inseeVille');
    }


}
