<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /**
     * Generated
     */

    protected $table = 'question';
    protected $fillable = ['idQuest', 'libQuest', 'repQuest', 'idTraj'];


    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
