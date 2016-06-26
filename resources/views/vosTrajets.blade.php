@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
    		<div>
                    <div class="list">
                    @if (count($trajets)==0)
                         <div class="col-xs-12 col-sm-12">
                        <h3 style="text-align: center">Auncun trajet, ajoutez en un <a href="{{ url('/trajet/add') }}">ici</a>.</h3>
                        </div>
                    @endif
                    @if (isset($message))
                        <h5 style="text-align: center; color:green">{{$message}}</h3>
                    @endif
                    @foreach ($trajets as $key => $trajet)
                    <div class="list-item">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="height: 40px;">
                                <div style="float: left;">Trajet N° {{ $trajet->idTraj }} le {{ date('d F Y', strtotime($trajet->dateTraj)) }} à {{ $trajet->heureTraj }}</div>
                                <div style="float: right; font-size: 20px; color: orange;">{{$trajet->tarifTraj}}€</div>
                            </div>
                            <div class="panel-body"> 
                                <div class="col-md-6">
                                    <p>Départ : {{ $trajet->etapetrajets[0]->etape->ville->nomVille }}</p>
                                    <p class="hour">Heure de départ : {{ $trajet->heureTraj }}</p>
                                    @if ($trajet->autoRoutTraj == 1)
                                        <p>autoroute : Oui</p>
                                    @else
                                        <p>autoroute : Non</p>
                                    @endif
                                        <p>Arrivée : {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}</p>
                                    @if (strtotime($trajet->dateTraj) > $now)
                                        <p><a href="trajet/{{$trajet->idTraj}}/annuler"><button class="btn btn-primary">Annuler le Trajet</button></a></p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p>Etapes : 
                                        @foreach ($trajet->etapes as $key => $etape)
                                            @if($key == count($trajet->etapes)-1)
                                                {{$etape->adresseEtape}}
                                            @else
                                                {{$etape->adresseEtape}} => 
                                            @endif
                                        @endforeach
                                    </p>
                                    <p>
                                        Vehicule : {{$trajet->vehicule->modele->nomMod}}
                                    </p>
                                </div>
                                <!-- @if ($trajet->dateTraj < $now) -->
                                    <h3>Personnes inscrites : </h3>   
                                    <div class="inscrits" style="overflow: auto;max-height: 150px;">
                                        {{--*/ 
                                            $inscrits = $trajet->inscrits;
                                        /*--}}
                                        @if (count($inscrits)==0)
                                            Aucune
                                        @endif
                                        @foreach ($inscrits as $inscrit)
                                            @if($inscrit->valideInscrit!=2)
                                            <div class="inscrit" style="height: 150px;">
                                            {{--*/
                                                $query = "SELECT * FROM inscrit a, trajet b, users c WHERE a.idTraj = :idTraj order by a.dateCommentVInscrit DESC";
                                                $dernierAviss = DB::select( DB::raw($query), array(
                                                            'idTraj' => $inscrit->idTraj
                                                ));
                                                $dernierAvis = $dernierAviss[0];
                                            /*--}}
                                            <div class="col-md-6">
                                                <img src="{{ $inscrit->user->photoMemb }}" alt="photo de profil" /> {{$inscrit->user->prenomMemb}} {{$inscrit->user->name}}
                                                <p>Age : {{$trajet->user->ageMemb or 'inconnu'}}</p>
                                                <p>
                                                    @for ($i = 0; $i < 8 ; $i=$i+2)                                
                                                        <img src="{{ URL::asset('images/pref-'.substr($trajet->user->prefMemb,$i, 2)) }}.png" alt="préférence conducteur,">
                                                    @endfor
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                @if (strtotime($trajet->dateTraj) > $now)
                                                        @if ($inscrit->valideInscrit == 0)
                                                        <p><a href="/trajet/{{$inscrit->idTraj}}/{{$inscrit->idMemb}}/accepter"><button class="btn btn-primary">Accepté</button></a>
                                                        <a href="/trajet/{{$inscrit->idTraj}}/{{$inscrit->idMemb}}/refuser"><button class="btn btn-primary">Refuser</button></a></p>
                                                        @endif
                                                    @if(isset($dernierAvis->avisVInscrit) && isset($dernierAvis->commentaireVInscrit))
                                                        <h4>Dernier avis sur le passager :</h4>
                                                        <b>{{$dernierAvis->avisVInscrit}}/5</b>
                                                        <em>{{$dernierAvis->commentaireVInscrit}}</em>
                                                    @endif
                                                @else
                                                    <h4>Déposer un avis</h4>
                                                 <div class="input-group">
                                                 {!! BootForm::openHorizontal(['sm' => [4, 8],'lg' => [2, 10]])->attribute('onsubmit','return submitForm(this)')->post()->action('/trajet') !!}
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
                                                <input type="hidden" name="idMemb" value="{{$inscrit->user->id}}"></input>
                                                <input type="text" class="form-control" style="display: block;" name="commentaireCInscrit" placeholder="Laissez un commentaire ! :)">
                                                <input class="btn btn-default" style="display: block;" type="submit" value="Go!">
                                                </form>
                                                </div>                                                
                                                @endif
                                            </div>
                                            </div>
                                            @else
                                                Aucune
                                            @endif
                                        @endforeach
                                    </div>
                                <!-- @endif -->
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    
            </div>
        </div>
    </div>
</div>
@endsection
