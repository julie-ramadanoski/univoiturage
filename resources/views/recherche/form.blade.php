@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
			<img src="..\public\images\logo.png" alt="caràfond" style="width:35%; margin-left:auto; margin-right:auto; display:block;"/>
			 
			@if ( $errors->has() )
			    <div class="alert alert-danger">			        
			        <p>Veuillez remplir les champs</p>			           			        
			    </div>
			@endif
			
	        {!! BootForm::openHorizontal($columnSizes)->post()->action('/recherche') !!}

				{!! BootForm::text('Université', 'universite')->placeholder('Aix Marseille')->required('required'); !!}
				{!! BootForm::text('Ville de départ', 'villedepart')->placeholder('Gap')->required('required'); !!}
				{!! BootForm::text('Ville d\'arrivée', 'villearrivee')->placeholder('Marseille')->required('required'); !!}

				<div class="form-group">
					<label class="col-md-4 control-label">{!! BootForm::label('Choisir le jour')->forId('datetimepicker1'); !!}</label>
					<div class="col-md-6">
	                <div class='input-group date' id='datetimepicker1'>
	                    <input type='text' class="form-control" name="datedepart" id="datedepart" required/>
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
                </div>
                </div>

                {!! BootForm::radio('Voiture', 'vehicule')->defaultToChecked(); !!}
                {!! BootForm::radio('Moto', 'vehicule'); !!}
				
				{!! BootForm::submit('Rechercher') !!}
			{!! BootForm::close() !!}
    </div>
</div>
@include('recherche.informations.informations')
@endsection

	