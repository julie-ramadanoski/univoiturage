@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Resultats de la recherche</div>

        <!-- Filtre de recherche -->
        <link href="{{ URL::asset('/css/jplist.core.min.css') }}"               rel="stylesheet" type="text/css">
       <!--<link href="{{ URL::asset('/css/jplist.bootstrap.min.css') }}"          rel="stylesheet" type="text/css">
         <link href="{{ URL::asset('/css/jplist.checkbox-dropdown.min.css') }}"  rel="stylesheet" type="text/css"> 
       <link rel="stylesheet" href="{{ URL::asset('/css/jplist-jquery-ui-bundle.min.css') }}" />-->
       <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> 

        <script src="{{ URL::asset('/js/jplist.core.min.js') }}"                        type="text/javascript"></script>
        <script src="{{ URL::asset('/js/jplist.bootstrap-pagination-bundle.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/jplist.filter-toggle-bundle.min.js') }}"        type="text/javascript"></script>
        <script src="{{ URL::asset('/js/jplist.jquery-ui-bundle.min.js') }}"            type="text/javascript"></script>
        <script src="{{ URL::asset('/js/jplist.sort-bundle.min.js') }}"                 type="text/javascript"></script>
        <script src="{{ URL::asset('/js/activerJpList.js') }}"                          type="text/javascript"></script>

        {{--*/  

            $dist    = 0;
            $tps     = 0;       
            $moyTps  = 0;
            $moyDist = 0;

        /*--}}

        <!-- panel de filtrage -->
        <div id="jplist" class="jplist">

            <div class="row">

                <!-- controls -->
                <div class="col-sm-4">
                    <div class="jplist-panel">  
                        <h3>Affinezvotre recherche</h3>
                        <div class="input-group">
                            <!-- likes range slider -->
                            <!-- likesSlider and likesValues are user function defined in jQuery.fn.jplist.settings -->
                            <!-- ios button: show/hide panel -->
                            <div class="jplist-ios-button">
                                <i class="fa fa-sort"></i>
                                jPList Actions
                            </div>
                        

                            <!-- toggle genre personne -->
                            <div class="btn-group" role="group">
                                <button class="btn btn-default"
                                     type="button"                                  
                                     data-control-type="button-filter"
                                     data-control-action="filter"
                                     data-control-name="femme-btn" 
                                     data-path=".sexe[genre='0']"
                                     data-selected="true">
                                     <i class="fa fa-venus"></i>
                                     Femme
                                </button>
                                                 
                                <button class="btn btn-default"
                                     type="button" 
                                     data-control-type="button-filter"
                                     data-control-action="filter"
                                     data-control-name="homme-btn" 
                                     data-path=".sexe[genre='1']"
                                        <i class="fa fa-mars "></i>
                                    Homme
                                </button>  
                            </div>

                            <!-- Toogle photo -->
                            <div class="btn-group" role="group">
                            <button class="btn btn-default"
                                 type="button"
                                 data-control-type="button-filter"
                                 data-control-action="filter"
                                 data-control-name="photo-btn" 
                                 data-path="img[src='']"
                                    <i class="fa fa-photo "></i>
                                    photo
                                 </button> 
                            </div>

                            <!-- trier par prix ou heure -->
                            <div class="input-group">
                                <select 
                                   class="jplist-select" 
                                   data-control-type="sort-select" 
                                   data-control-name="sort" 
                                   data-control-action="sort">
                                   
                                      <option data-path="default">Triée par</option>
                                      <option data-path=".prix" data-order="asc" data-type="text">Prix croissant</option>
                                      <option data-path=".prix" data-order="desc" data-type="text">Prix décroissant</option>
                                      <option data-path=".hour" data-order="asc" data-type="text">Heure croissante</option>
                                      <option data-path=".hour" data-order="desc" data-type="text">Heure décroissante</option>                           
                                </select>   
                            </div>
                            <!-- pagination info label -->
                            
                            <div  class="input-group"
                                class="pull-left jplist-pagination-info"
                                data-type="<strong>Page {current} of {pages}</strong><br/> <small>{start} - {end} of {all}</small>" 
                                data-control-type="pagination-info" 
                                data-control-name="paging" 
                                data-control-action="paging"></div>
                                
                            <!-- items per page dropdown -->
                            <div class="input-group"
                                class="dropdown pull-left jplist-items-per-page"
                                data-control-type="boot-items-per-page-dropdown" 
                                data-control-name="paging" 
                                data-control-action="paging">

                                <button 
                                    class="btn btn-primary dropdown-toggle" 
                                    type="button" 
                                    data-toggle="dropdown" 
                                    id="dropdown-menu-1"
                                    aria-expanded="true">                   
                                    <span data-type="selected-text">Items per Page</span>
                                    <span class="caret"></span>                     
                                </button>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-1">

                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#" data-number="2">2 par page</a>
                                    </li>

                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#" data-number="5" data-default="true">5 par page</a>
                                    </li>
                                    
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#" data-number="10">10 par page</a>
                                    </li>

                                    <li role="presentation" class="divider"></li>

                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#" data-number="all">Voir tous</a>
                                    </li>
                                </ul> 

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <!-- bootstrap pagination control -->
                                    <ul 
                                         class="pagination pull-left jplist-pagination"
                                         data-control-type="boot-pagination" 
                                         data-control-name="paging" 
                                         data-control-action="paging"
                                         data-range="3"
                                         data-mode="google-like">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- liste de résultats-->
                <div class="col-sm-8">
                    <div class="list">
                    @foreach ($trajets as $trajet)
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
                                <!-- descriotif du trajet -->
                                <div class="row">
                                  
                                    <div class="col-xs-6 col-sm-4">
                                        
                                        <img src="{{ $trajet->user->photoMemb }}" alt="photo de profil" />
                                        
                                        <p>{{ $trajet->user->name }} {{ $trajet->user->prenomMemb }}</p>
                                        <p class="sexe" genre="{{ $trajet->user->sexeMemb }}">age {{{ $trajet->user->ageMemb or 'inconnu' }}} </p>
                                        <p>level {{ $trajet->user->totAvisM or 'innonnu' }}</p>
                                        
                                         @for ($i = 0; $i < 8 ; $i=$i+2)                                
                                            <img src="{{ URL::asset('images/pref-'.substr($trajet->user->prefMemb,$i, 2)) }}.png" alt="préférence conducteur,">
                                        @endfor 

                                    </div>
                                        
                                    <div class="col-xs-6 col-sm-4">
                                            
                                        <p>Départ :{{ $trajet->etapetrajets[0]->etape->ville->nomVille }}</p>
                                        <p class="hour">{{ $trajet->heureTraj }} H</p>
                                        <p>autoroute : {{ $trajet->autoRoutTraj }}</p>
                                        <p>Arrivée : {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}</p>
                                        <p>Etapes
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
                                        <p class="prix">{{ $trajet->tarifTraj or 0}} €</p>
                                        <p>Places restantes : {{ ($nbPlacesMaxi - $nbPlacePrises) }} /{{ $nbPlacesMaxi }}</p>
                                        <p><a href="{{ url('/recherche/'. $trajet->idTraj) }}"><button class="btn btn-primary">Détails</button></a></p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    
                    </div>
                </div>
                <!-- no results found -->
                <div class="jplist-no-results">
                    <p>No results found</p>
                </div>

            </div>

            @if ( count($trajets) > 0)
              {{--*/ $moyTps  = ( $tps  / count($trajets) ) /*--}}
    		  {{--*/ $moyDist = ( $dist / count($trajets) ) /*--}}
            @endif
             <p>
                {{ count($trajets) }} trajet(s) du site de {{ $recherche->villedepart }} à {{ $recherche->villearrivee}}. Distance {{ $moyDist }} km ; Durée moyenne du trajet : {{ $moyTps }} minutes
            </p>
        </div>
    </div>
</div>
@endsection