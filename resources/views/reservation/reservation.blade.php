@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
    	<p>Retrouvez ici vos réservations en cours.</p>
    		@for ($i = 0; $i < count($inscrits); $i++)
	    	<div class="preferences">
	    		<p>{{$trajets[$i]->dateTraj}} - {{$trajets[$i]->heureTraj}}</p>
	    		De {{$trajets[$i]->dateTraj}} à {{$trajets[$i]->dateTraj}}
	    	</div>
    		@endfor
    </div>
</div>
@endsection
