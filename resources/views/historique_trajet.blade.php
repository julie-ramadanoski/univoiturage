@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
    		<div class="col-sm-12">
                    <div class="list">
                    @if (count($trajets)==0)
                         <div class="col-xs-12 col-sm-12">
                        <h3 style="text-align: center">Auncune reservation.</h3>
                        </div>
                    @endif
                    @if (isset($message))
                        <h5 style="text-align: center; color:green">{{$message}}</h3>
                    @endif
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
                                        <p><a href="{{ url('/recherche/'. $trajet->idTraj) }}"><button class="btn btn-primary">Annuler la Réservation</button></a></p>
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
                                        <div class="input-group">
                                            {!! BootForm::openHorizontal(['sm' => [4, 8],'lg' => [2, 10]])->attribute('onsubmit','return submitForm(this)')->post()->action('/reservations') !!}
                                                <label class="radio-inline">
                                                  <input type="radio" name="avisCInscrit" id="inlineRadio1" value="1"> 1
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="avisCInscrit" id="inlineRadio2" value="2"> 2
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="avisCInscrit" id="inlineRadio3" value="3"> 3
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="avisCInscrit" id="inlineRadio4" value="4"> 4
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="avisCInscrit" id="inlineRadio5" value="5"> 5
                                                </label>
                                                <input type="hidden" name="idTraj" value="{{$trajet->idTraj}}"></input>
                                                <input type="text" class="form-control" style="display: block; margin-top: 10px;" name="commentaireCInscrit" placeholder="Laissez un commentaire ! :)">
                                                <input class="btn btn-default" style="display: block; margin-top: 60px;" type="submit" value="Go!">
                                            </form>
                                        </div>
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
