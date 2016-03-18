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
	        	<div class="form-group">
	        		<div class="col-md-10">
		        	Genre : 
		        	@if ( auth()->user()->sexeMemb == "0" )
		        		M
				    @else		
				    	F
					@endif
					</div>
				</div>
				<div class="form-group">
				    <label for="name" class="control-label col-md-2">Nom</label>
				    <div class="col-md-10">
				        <input type="text" name="name" value="{!!auth()->user()->name!!}" class="form-control" required>
				    </div>
				</div>
				<div class="form-group">
				    <label for="prenomMemb" class="control-label col-md-2">Prénom</label>
				    <div class="col-md-10">
				        <input type="text" name="prenomMemb" value="{!!auth()->user()->prenomMemb!!}" class="form-control" required>
				    </div>
				</div>
				<div class="form-group">
				    <label for="email" class="control-label col-md-2">Email</label>
				    <div class="col-md-10">
				        <input type="text" name="email" value="{!!auth()->user()->email!!}" class="form-control" required>
				    </div>
				</div>
				<div class="form-group">
				    <label for="telMobMemb" class="control-label col-md-2">Téléphone</label>
				    <div class="col-md-10">
				        <input type="text" name="telMobMemb" value="{!!auth()->user()->telMobMemb!!}" class="form-control" required>
				    </div>
				</div>				
				<div class="form-group">
				    <label for="anNaisMemb" class="control-label col-md-2">Année de naissance</label>
				    <div class="col-md-10">
				        <input type="text" name="anNaisMemb" value="{!!auth()->user()->anNaisMemb!!}" class="form-control">
				    </div>
				</div>			
				{!! BootForm::submit('Submit') !!}
			{!! BootForm::close() !!}
			
    </div>
</div>
@endsection