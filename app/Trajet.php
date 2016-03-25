<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    /**
     * Generated
     */

    protected $table = 'trajet';

    protected $primaryKey = 'idTraj';
    
    protected $fillable = ['idTraj', 'dateTraj', 'heureTraj', 'nbPlacesTraj', 'tarifTraj', 'autoRoutTraj', 'detoursTraj', 'depaDecTraj', 'bagageTraj', 'infoTraj', 'distTraj', 'dureeTraj', 'idMemb', 'idVeh', 'listeInseeEtapeTrajet', 'listeDistEtapeTrajet'];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(\App\User::class, 'idMemb', 'id');
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
        
        
        // Prendre les infos des villes recherchées
        $rowVillesDep = DB::table('ville')
                    ->join('site', 'ville.inseeVille', '=', 'site.inseeVille')
                    ->where('nomVille', $villeDepart)
                    ->orWhere('nomSite', $villeDepart)
                    ->get();

        $rowVillesArr = DB::table('ville')
                    ->join('site', 'ville.inseeVille', '=', 'site.inseeVille')
                    ->where('nomVille', $villeArrivee)
                    ->orWhere('nomSite', $villeArrivee)
                    ->get();

         if( $rowVillesDep != null && $rowVillesArr != null){

            // Requete préparée permettant de trouver les trajets correspondant
            $query = "select distinct idTraj
            from etapetrajet as et2
            where et2.idTraj in(
                -- Selectionne trajet ville de départ
                select et.idTraj
                from etapetrajet as et
                natural join etape as e
                natural join trajet as t
                natural join ville as v
                where t.dateTraj = :dateRecherche
                and get_distance_kms(v.latitudeVille, v.longitudeVille, :latitudeVilleDep, :longitudeVilleDep) <= t.detoursTraj
                and et.idTraj in ( 
                -- selectionne ville d'arrivée sur le meme trajet
                    select et1.idTraj
                    from etapetrajet as et1
                    natural join etape as e1
                    natural join ville as v1
                    where v1.nomVille = :nomVilleArr
                    and et1.numOrdreEtapeTrajet > et.numOrdreEtapeTrajet))";

            // SAFE QUERY http://fideloper.com/laravel-raw-queries
           $results = DB::select( DB::raw($query), array(
                    'dateRecherche'     => $dateRecherche,
                    'latitudeVilleDep'  => $rowVillesDep[0]->latitudeVille,
                    'longitudeVilleDep' => $rowVillesDep[0]->longitudeVille,
                    'nomVilleArr'       => $rowVillesArr[0]->nomVille
                ) );

        } else {

            $results = array();
        }

        // Passage de stdClass vers array  
        $arrTraj = array();
        foreach ($results as $res) {
           $arrTraj[] = $res->idTraj;  
        }

        // Ajout des relations pour chaque trajets
        $queryTraj->with('user', 'vehicule', 'etapetrajets.etape.ville', 'inscrits', 'questions')
                ->whereIn('idTraj', $arrTraj);
        
        return $queryTraj; 
    }
}
