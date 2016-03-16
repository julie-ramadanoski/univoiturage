@extends('profil')

@section('content')

<div class="container">
    <div class="content">
			@if ( $errors->has() )
			    <div class="alert alert-danger">			        
			        <p>Veuillez remplir les champs</p>			           			        
			    </div>
			@endif
			
	        {!! BootForm::openHorizontal($columnSizes)->post()->action('/profil') !!}

				{!! BootForm::text('Nom', 'name')->placeholder(auth()->user()->name)->required('required'); !!}
				{!! BootForm::text('Ville de départ', 'villedepart')->placeholder('Gap')->required('required'); !!}
				{!! BootForm::text('Ville d\'arrivée', 'villearrivee')->placeholder('Marseille')->required('required'); !!}

				<div class="form-group">
					{!! BootForm::label('Choisir le jour')->forId('datetimepicker1'); !!}
	                <div class='input-group date' id='datetimepicker1'>
	                    <input type='text' class="form-control" name="datedepart" id="datedepart" required/>
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
                </div>

                {!! BootForm::radio('Voiture', 'vehicule')->defaultToChecked(); !!}
                {!! BootForm::radio('Moto', 'vehicule'); !!}
				
				{!! BootForm::submit('Submit') !!}
			{!! BootForm::close() !!}
			
    </div>
</div>
@endsection