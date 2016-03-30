@extends('recherche')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2"  style="margin-bottom:200px">
			<div class="panel panel-default">
				<div class="panel-heading">Connexion</div>
				<div class="panel-body" >
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oops!</strong> Vos informations ci-dessous sont inexactes. Veuillez les vérifier.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<a class="btn btn-info" href="facebook" role="button" style="float: right;">Connexion par Facebook</a>


					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse mail</label>
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
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Se souvenir de moi
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Se connecter</button>
								<a class="btn btn-link" href="{{ url('/password/email') }}">Mot de passe oublié?</a>
								<button type="button" class="btn btn-secondary" onclick="self.location.href='{{ url('/auth/register') }}'" id="dejamembre">Pas encore membre? Enregistrez vous !</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection