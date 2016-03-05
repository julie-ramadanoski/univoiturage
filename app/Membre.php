<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Membre extends Authenticatable {
    /**
     * Generated
     */
    protected $table = 'membre';
    protected $fillable = ['id', 'name', 'prenomMemb', 'email', 'telMobMemb', 'sexeMemb', 'anNaisMemb', 'pseudoMemb', 'presentMemb', 'prefMemb', 'casqueMemb', 'photoMemb', 'photoValidMemb', 'nbAvisC', 'nbAvisV', 'totAvisC', 'totAvisM', 'nbInscrit', 'site_idSite', 'password'];
    
    public $timestamps = false;
     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    
}