    @extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Resultats de la recherche</div>

        {{--*/  

            $dist    = 0;
            $tps     = 0;       
            $moyTps  = 0;
            $moyDist = 0;

        /*--}}
        
        </p>
            
            @foreach ($trajets as $trajet)

                {{--*/ 

                    $prix = 0;
                    $nbPlacePrises = 0;
                    $nbPlacesMaxi = $trajet->vehicule->nbPlaceVeh;
                
                /*--}}
                
                <div class="panel panel-primary">
                    <div class="panel-heading"> Trajet N° {{ $trajet->idTraj }} le {{ date('d F Y', strtotime($trajet->dateTraj)) }} à {{ $trajet->heureTraj }}</div>
                    <div class="panel-body">              
                        <div class="row">
                          
                            <div class="col-xs-6 col-sm-4">
                                
                                <img src="{{ $trajet->membre->photoMemb }}" alt="photo de profil" /><br>
                                
                                {{ $trajet->membre->nomMemb }} {{ $trajet->membre->prenomMemb }} <br>
                                age {{{ $trajet->membre->ageMemb or 'inconnu' }}}<br>
                                level {{ $trajet->membre->totAvisM or 'innonnu' }}<br>
                                
                                @for ($i = 0; $i < 3 ; $i++)                                
                                    <img src="images/pref_{{ substr($trajet->membre->prefMemb,$i, 1 ) }}.png" alt="préférence conducteur,">
                                @endfor 

                            </div>
                                
                            <div class="col-xs-6 col-sm-4">

                                Départ :{{ $trajet->etapetrajets[0]->etape->ville->nomVille }} 
                                autoroute : {{ $trajet->autoRoutTraj }}<br>
                                Arrivée : {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}<br>
                                Etapes
                                @for ($i = 1; $i < count($trajet->etapetrajets) -1 ; $i++) 
                                    <span> > </span>{{ $trajet->etapetrajets[$i]->etape->ville->nomVille }}
                                        
                                    {{--*/ 

                                        $dist += $trajet->etapetrajets[$i]->distEtapeTrajet;
                                        $tps  += $trajet->etapetrajets[$i]->dureeEtapeTrajet;
                                        $prix += $trajet->etapetrajets[$i]->prixEtapeTrajet;
                                        
                                        if ($nbPlacePrises < $trajet->etapetrajets[$i]->placePrisesEtapeTrajet){
                                                $nbPlacePrises = $trajet->etapetrajets[$i]->placePrisesEtapeTrajet;  
                                        }  
                                    
                                    /*--}}
                                
                                @endfor
                                <p>
                                    Vehicule : {{ $trajet->vehicule->modele->marque->nomMarq }} {{ $trajet->vehicule->modele->nomMod }} <br>
                                    Confort
                                   
                                    @for ($i = 0; $i < $trajet->vehicule->confVeh ; $i++)
                                        <span>*</span>
                                    @endfor
                                </p>

                            </div>
                            
                            <div class="col-xs-12 col-sm-4">
                                prix : {{ $trajet->tarifTraj or 0}} €<br>
                                Places restantes : {{ ($nbPlacesMaxi - $nbPlacePrises) }} /{{ $nbPlacesMaxi }}<br>
                                <button class="btn btn-primary">Reserver</button>
                                <button class="btn btn-warning">Poser une question</button>
                            </div>                            
                        
                        </div>
                    </div> 
                </div>
            @endforeach

        @if ( count($trajets) > 0)
          {{--*/ $moyTps  = ( $tps  / count($trajets) ) /*--}}
		  {{--*/ $moyDist = ( $dist / count($trajets) ) /*--}}
        @endif
         <p>
            {{ count($trajets) }} trajet(s) du site de {{ $recherche->villedepart }} à {{ $recherche->villearrivee}}. Distance {{ $moyDist }} km ; Durée moyenne du trajet : {{ $moyTps }} minutes
        </p>
    </div>
</div>
@endsection