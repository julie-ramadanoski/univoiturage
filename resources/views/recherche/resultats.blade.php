@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Resultats de la recherche</div>
        <p>liste reçue de RechercheController@show</p>
        @foreach ($trajets as $trajet)
    		<p>This is trajet {{ $trajet->idTraj }}</p>
		@endforeach
			
    </div>
</div>
@endsection