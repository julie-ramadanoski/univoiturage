<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use DateTime;
use App\Alerte;
use App\Etape;
use App\Ville;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{

    public function __construct()
    {
         // Apply the jwt.auth middleware to all methods in this controller
         // except for the authenticate method. We don't want to prevent
         // the user from retrieving their token if they don't already have it
         $this->middleware('jwt.auth', [ 'except' => ['authenticate'] ]);
    }

    
    public function delAlertes(Request $request){
        if( $this->getAuthenticatedUser()->getStatusCode() == 200 ){

            $user = JWTAuth::parseToken()->authenticate();
            $alerte = Alerte::findOrFail($request->input('idAlerte'));

            // Si l'alerte appartient à l'utilisateur, supprimer avec etapes
            if($user->alertes()->first() == $alerte){

                $etapeDep = $alerte->etapeDepart();
                $etapeArr = $alerte->etapeArrivee();
                $alerte   ->delete();
                $etapeDep ->delete(); 
                $etapeArr ->delete(); 


                return response()->json(['Suppression de l\'alerte '. $request->input('idAlerte')], 200);

            }

            return response()->json(['ville_not_found'], 404);

        }

    }
    public function setAlertes(Request $request){

        if( $this->getAuthenticatedUser()->getStatusCode() == 200 ){
            
            $user = JWTAuth::parseToken()->authenticate();
            $user->load('alertes.etapeDepart.ville','alertes.etapeArrivee.ville');
            $alerte = $user->alertes;
           
            //dd($alerte);
            // Si l'utilisateur n'a pas encore d'alerte, l'enregistrer            
            if(count($alerte) == 0){

                $alerte   = new Alerte;
                $villeDep = new Etape;
                $villeArr = new Etape;
                $date     = new DateTime(date('Y-m-d'));

                $villeDep->ville()->associate(Ville::where('nomVille', $request->input('villeDepartAlerte'))->first() );
                $villeArr->ville()->associate(Ville::where('nomVille', $request->input('villeArriveeAlerte'))->first() );
                
                // Si une ville n'est pas reconnue envoyer message erreur
                if($villeDep->inseeVille == null || $villeArr->inseeVille == null){
                    return response()->json(['ville_not_found'], 404);          
                }

                $villeDep->save();
                $villeArr->save();

                $alerte->dateAlerte = $date;
                $alerte->heureAlerte = $request->input('heureAlerte');
                $alerte->etapeDepart()->associate($villeDep->idEtape);
                $alerte->etapeArrivee()->associate($villeArr->idEtape);
                $alerte->membre()->associate( $user->id ); // retourne un utilisateur identifié par token

                $alerte->save();
                $alerte->load('etapeDepart.ville','etapeArrivee.ville');
            } 

            // Dans tout les cas retourner l'alerte
            return response()->json($alerte);
        }


    }

    public function getAlertes(Request $request, $depart = null )
    {
        
        // Si la requete précédente valide le token de l'utilisateur
        if( $this->getAuthenticatedUser()->getStatusCode() == 200 ){


            $alerte = new Alerte;
            // Retrouner la liste des alertes
            if($depart == null){                
                return response()->json($alerte
                                    ->join('etape', 'alerte.idEtapeDepartAlerte', '=', 'etape.idEtape')
                                    ->join('ville', 'etape.inseeVille', '=', 'ville.inseeVille')
                                    ->join('users', 'alerte.idMemb', '=', 'users.id')
                                    ->with('etapeArrivee.ville')
                                    ->with('etapeDepart.ville')
                                    ->get()
                                    ); 
            // Sinon retourner la ville choisie
            } else {

                // Si la ville n'existe pas retourner erreur 404 pour en informer l'utilisateur
                $ville = DB::table('ville')->where('nomVille', $depart)->get();

                if(count($ville)  == 0 ){
                    return response()->json(['error' => 'Ville non trouvée'], 401);
                   dd(count($ville));

                }

                return response()->json($alerte->join('etape', 'alerte.idEtapeDepartAlerte', '=', 'etape.idEtape')
                                    ->join('ville', 'etape.inseeVille', '=', 'ville.inseeVille')
                                    ->join('users', 'alerte.idMemb', '=', 'users.id')
                                    ->where('nomVille', $depart)
                                    ->with('etapeArrivee.ville')
                                    ->with('etapeDepart.ville')
                                    ->get()
                                    );
            }
        }
    }
    
    public function authenticate(Request $request)
    {
                
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

           
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        $user->load('alertes.etapeDepart.ville','alertes.etapeArrivee.ville');
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
    
}
