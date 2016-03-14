<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use App\Alerte;
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

    public function index()
    {
        $user = User::all();
        return $user;
    }

    
    public function getAlertes(Request $request, $depart = 'marseille' )
    {
        
        // Si la requete précédente valide le token de l'utilisateur
        if( $this->getAuthenticatedUser()->getStatusCode() == 200 ){


            $alerte = new Alerte;
            // Retrouner la liste des alertes
            return response()->json($alerte->join('etape', 'idEtapeDepartAlerte', '=', 'idEtape')
                                    ->join('ville', 'etape.insee', '=', 'ville.insee')
                                    ->where('idEtapeDepartAlerte', '=', 'inseeVille')
                                    ->where('nomVille', $depart)
                                    );
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

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
    
}
