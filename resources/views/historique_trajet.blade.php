@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
    		<div class="col-sm-12">
                    <div class="list">
                    @foreach ($trajets as $key => $trajet)
                    <div class="list-item">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Trajet N° {{ $trajet->idTraj }} le {{ date('d F Y', strtotime($trajet->dateTraj)) }} à {{ $trajet->heureTraj }}
                            </div>
                            <div class="panel-body"> 

                                    {{--*/ 

                                        $prix = 0;
                                        $nbPlacePrises = 0;
                                        $nbPlacesMaxi = $trajet->vehicule->nbPlaceVeh;
                                    
                                    /*--}}
                                <!-- descriptif du trajet -->
                                <div class="row">
                                  
                                    <div class="col-xs-6 col-sm-4">
                                        
                                        <img src="{{ $trajet->user->photoMemb }}" alt="photo de profil" />
                                        
                                        <p>{{ $trajet->user->name }} {{ $trajet->user->prenomMemb }}</p>
                                        <p class="sexe" genre="{{ $trajet->user->sexeMemb }}">age {{{ $trajet->user->ageMemb or 'inconnu' }}} </p>
                                        <p>level {{ $trajet->user->totAvisM or 'innonnu' }}</p>
                                        
                                         @for ($i = 0; $i < 8 ; $i=$i+2)                                
                                            <img src="{{ URL::asset('images/pref-'.substr($trajet->user->prefMemb,$i, 2)) }}.png" alt="préférence conducteur,">
                                        @endfor 
                                        <p class="prix">{{ $trajet->tarifTraj or 0}} €</p>
                                        <p><a href="{{ url('/recherche/'. $trajet->idTraj) }}"><button class="btn btn-primary">Détails</button></a></p>
                                    </div>
                                        
                                    <div class="col-xs-6 col-sm-4">
                                            
                                        <p>Départ :{{ $trajet->etapetrajets[0]->etape->ville->nomVille }}</p>
                                        <p class="hour">{{ $trajet->heureTraj }} H</p>
                                        <p>autoroute : {{ $trajet->autoRoutTraj }}</p>
                                        <p>Arrivée : {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}</p>
                                        <p>Etapes :
                                            @for ($i = 0; $i < count($trajet->etapetrajets) ; $i++) 
                                            	@if (($reservations[$key]->etapeDepart->idEtape == $trajet->etapetrajets[$i]->etape->idEtape || $reservations[$key]->etapeArrivee->idEtape == $trajet->etapetrajets[$i]->etape->idEtape) && $i != count($trajet->etapetrajets)-1)
                                            	<span> </span><b>{{ $trajet->etapetrajets[$i]->etape->ville->nomVille }}</b> ->
                                            	@elseif (($reservations[$key]->etapeDepart->idEtape == $trajet->etapetrajets[$i]->etape->idEtape || $reservations[$key]->etapeArrivee->idEtape == $trajet->etapetrajets[$i]->etape->idEtape) && $i == count($trajet->etapetrajets)-1)
                                            	<span> </span><b>{{ $trajet->etapetrajets[$i]->etape->ville->nomVille }}</b>
                                                @elseif ($i == count($trajet->etapetrajets)-1)
                                                <span> </span>{{ $trajet->etapetrajets[$i]->etape->ville->nomVille }}
                                                @else
                                                <span> </span>{{ $trajet->etapetrajets[$i]->etape->ville->nomVille }} ->
                                                @endif
                                            @endfor
                                        </p>
                                        <p>
                                            Vehicule : {{ $trajet->vehicule->modele->marque->nomMarq }} {{ $trajet->vehicule->modele->nomMod }} <br>
                                            Confort
                                           
                                            @for ($i = 0; $i < $trajet->vehicule->confVeh ; $i++)
                                                <span>*</span>
                                            @endfor
                                        </p>

                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Déposer un avis sur le conducteur</h4>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    
            </div>
        </div>
    </div>
</div>
@endsection
