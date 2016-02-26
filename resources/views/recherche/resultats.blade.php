@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Resultats de la recherche</div>
        <p>liste reçue de RechercheController@show</p>

        {{--*/ $moyenneDist = 0 /*--}}
        {{--*/ $moyenneTps = 0 /*--}}

        <p>{{ count($trajets) }} trajet(s) du site de Gap à Marseille. Distance {{ $moyenneDist }}km durée moyenne {{ $moyenneTps }}</p>
			
	        @foreach ($trajets as $trajet)
	    		<p>This is trajet {{ $trajet->idTraj }}</p>

			@endforeach

		
    </div>
</div>
@endsection