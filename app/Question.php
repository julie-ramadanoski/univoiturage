<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /**
     * Generated
     */

    protected $table = 'question';

    protected $primaryKey = 'idQuest';
    
    protected $fillable = ['idQuest', 'libQuest', 'repQuest', 'idTraj'];

    public $timestamps = false;

    public function trajet() {
        return $this->belongsTo(\App\Trajet::class, 'idTraj', 'idTraj');
    }


}
