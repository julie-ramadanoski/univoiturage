@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Resultats de la recherche</div>
        <p>liste reçue de RechercheController@show</p>

        {{--*/ $moyenneDist = 0 /*--}}
        {{--*/ $moyenneTps = 0  /*--}}
        {{--*/ $truc = 0  /*--}}
         <p>{{ count($trajets) }} trajet(s) du site de Gap à Marseille. Distance {{ $moyenneDist }}km durée moyenne {{ $moyenneTps }}</p>
			
	        @foreach ($trajets as $trajet)
                <p>numéro du trajet : {{ $trajet->idTraj }}</p>
	    		<p>Nom du conducteur : {{ $trajet->membre->nomMemb }} {{ $trajet->membre->prenomMemb }}</p>
                @foreach ($trajet->etapetrajets as $etapetrajet)
                    {{ $etapetrajet->etape->ville->nomVille }} > 
                    {{--*/ $moyenneDist += $etapetrajet->distEtapeTrajet /*--}}
                    {{--*/ $moyenneTps += $etapetrajet->dureeEtapeTrajet  /*--}}
                    
                @endforeach
			@endforeach
        @if ( count($trajets) > 0)
		  {{--*/ $truc = ($moyenneTps / count($trajets) ) /*--}}
        @endif
        {{ $truc }}
    </div>
</div>
@endsection