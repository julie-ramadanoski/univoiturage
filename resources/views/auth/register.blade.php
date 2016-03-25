@extends('recherche')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}
						
						<div class="form-group">
							<label for="site">Site Universitaire</label>
							<select class="form-control" id="site" name="site">
							</select>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmer</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Prénom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenomMemb" value="{{ old('prenomMemb') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">N°Téléphone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telMobMemb" value="{{ old('telMobMemb') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Année de naissance</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="anNaisMemb" value="{{ old('anNaisMemb') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Sexe :</label>
							<div class="col-md-6">
								<input type="radio" name="sexeMemb" value=0 checked> Homme<br>
  								<input type="radio" name="sexeMemb" value=1> Femme<br>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
