<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['id', 'name', 'prenomMemb', 'email', 'telMobMemb', 'sexeMemb', 'anNaisMemb', 'pseudoMemb', 'presentMemb', 'prefMemb', 'casqueMemb', 'photoMemb', 'photoValidMemb', 'nbAvisC', 'nbAvisV', 'totAvisC', 'totAvisM', 'nbInscrit', 'site_idSite', 'password'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}