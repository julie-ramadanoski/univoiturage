<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    /**
     * Generated
     */

    protected $table = 'trajet';
    protected $fillable = ['idTraj', 'dateTraj', 'heureTraj', 'nbPlacesTraj', 'tarifTraj', 'autoRoutTraj', 'detoursTraj', 'depaDecTraj', 'bagageTraj', 'infoTraj', 'distTraj', 'dureeTraj', 'idMemb', 'idVeh', 'listeInseeEtapeTrajet', 'listeDistEtapeTrajet'];

    public $timestamps = false;

    public function membre() {
        return $this->belongsTo(\App\Membre::class, 'idMemb', 'idMemb');
    }

    public function vehicule() {
        return $this->belongsTo(\App\Vehicule::class, 'idVeh', 'idVeh');
    }

    public function etapes() {
        return $this->belongsToMany(\App\Etape::class, 'etapetrajet', 'idTraj', 'idEtape');
    }

    public function etapetrajets() {
        return $this->hasMany(\App\Etapetrajet::class, 'idTraj', 'idTraj');
    }

    public function inscrits() {
        return $this->hasMany(\App\Inscrit::class, 'idTraj', 'idTraj');
    }

    public function questions() {
        return $this->hasMany(\App\Question::class, 'idTraj', 'idTraj');
    }

    public function scopeTrajetsTrouves( $queryTraj, $dateRecherche, $villeDepart, $villeArrivee, $vehicule){
        // ecrire la requete pour trouver les trajets correspondants à une demande
        
        // SAFE QUERY http://fideloper.com/laravel-raw-queries
        /*$someVariable = Input::get("some_variable");

        $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = :somevariable"), array(
           'somevariable' => $someVariable,
         ));*/
        //dd($dateRecherche);
       //dd($villeDepart);
         dd($queryTraj);
/*
        $rowdepart = DB::table('ville')->where('nomVille', $villeDepart )->get();
       
       
        $query = "select *
        from etapeTrajet as et2
        where et2.idTraj in(
            select et.idTraj
            from etapeTrajet as et
            natural join etape as e
            natural join trajet as t
            natural join ville as v
            -- where t.dateTraj = '2016-01-17'
            -- coord de bourg saint andéol 44.3667, 4.65 < 5km de pierrelatte 44.9333, 4.9
            where get_distance_kms(v.latitudeVille, v.longitudeVille, 44.3667, 4.65) <= t.detoursTraj
            -- coord de portes les valence 44.8667, 4.8833 < 10km de valence
            -- and get_distance_kms(v.latitudeVille, v.longitudeVille, 44.8667, 4.8833) <= t.detoursTraj
            and et.idTraj in (
                -- selectionne ville d'arrivée sur le meme trajet
                select et1.idTraj
                from etapeTrajet as et1
                natural join etape as e1
                natural join ville as v1
                where v1.nomVille = 'aix-en-provence'
                -- ou la ville d'arrivé sera déservie apres la ville de départ
                and et1.numOrdreEtapeTrajet > et.numOrdreEtapeTrajet))";

        $results = DB::select( DB::raw($query) );

        return $results;        */

    }

}
