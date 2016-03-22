@extends('profil')

@section('content')

<div class="container">
    <div class="content">
			@if ( $errors->has() )
			    <div class="alert alert-danger">			        
			        <p>Veuillez remplir les champs</p>			           			        
			    </div>
			@endif
	       	{!! BootForm::openHorizontal($columnSizes)->attribute('onsubmit','return submitForm(this)')->post()->action('/profil') !!}
			<!-- onsubmit="return submitForm(this) -->
			<!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/profil') }}" onsubmit="return submitForm()"> -->
	        <div id="preferences">
	        	<div class="form-group">
		        	 <label for="name" class="control-label col-md-2">Genre</label>
	        		<div class="col-md-10">
		        	@if ( auth()->user()->sexeMemb == "0" )
		        		<input type="text" name="genre" value="M" class="form-control" readonly="true">
				    @else		
				    	<input type="text" name="genre" value="F" class="form-control" readonly="true">
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
			</div>
			<div id="photo">
				
			</div>
			<div id="preferences">
				<div class="form-group">
				    <label for="pref0" class="control-label col-md-2">Tu parles</label>
				    <div class="col-md-10">
				    	<input type="radio" name="pref0" value="11" required @if (preg_match("/11[0-9]{6}/", auth()->user()->prefMemb) == 1) checked @endif> Beaucoup<br>
				    	<input type="radio" name="pref0" value="12" @if (preg_match("/12[0-9]{6}/", auth()->user()->prefMemb) == 1) checked @endif> Un peu<br>
				    	<input type="radio" name="pref0" value="13" @if (preg_match("/13[0-9]{6}/", auth()->user()->prefMemb) == 1) checked @endif> Pas du tout
				    </div>
				</div>	
				<div class="form-group">
				    <label for="pref1" class="control-label col-md-2">Tu Fumes</label>
				    <div class="col-md-10">
				    	<input type="radio" name="pref1" value="21" required @if (preg_match("/[0-9]{2}21[0-9]{4}/", auth()->user()->prefMemb) == 1) checked @endif> Beaucoup<br>
				    	<input type="radio" name="pref1" value="22" @if (preg_match("/[0-9]{2}22[0-9]{4}/", auth()->user()->prefMemb) == 1) checked @endif> Un peu<br>
				    	<input type="radio" name="pref1" value="23" @if (preg_match("/[0-9]{2}23[0-9]{4}/", auth()->user()->prefMemb) == 1) checked @endif> Pas du tout
				    </div>
				</div>
				<div class="form-group">
				    <label for="pref2" class="control-label col-md-2">Tu écoutes de la musique</label>
				    <div class="col-md-10">
				    	<input type="radio" name="pref2" value="31" required @if (preg_match("/[0-9]{4}31[0-9]{2}/", auth()->user()->prefMemb) == 1) checked @endif> Beaucoup<br>
				    	<input type="radio" name="pref2" value="32" @if (preg_match("/[0-9]{4}32[0-9]{2}/", auth()->user()->prefMemb) == 1) checked @endif> Ca dépend quoi<br>
				    	<input type="radio" name="pref2" value="33" @if (preg_match("/[0-9]{4}33[0-9]{2}/", auth()->user()->prefMemb) == 1) checked @endif> Pas du tout
				    </div>
				</div>
				<div class="form-group">
				    <label for="pref3" class="control-label col-md-2">Tolères tu les animaux ?</label>
				    <div class="col-md-10">
				    	<input type="radio" name="pref3" value="41" required @if (preg_match("/[0-9]{6}41/", auth()->user()->prefMemb) == 1) checked @endif> Oui<br>
				    	<input type="radio" name="pref3" value="42" @if (preg_match("/[0-9]{6}42/", auth()->user()->prefMemb) == 1) checked @endif> Ca dépend lesquels<br>
				    	<input type="radio" name="pref3" value="43" @if (preg_match("/[0-9]{6}43/", auth()->user()->prefMemb) == 1) checked @endif> Non
				    </div>
				</div>
				<input type='hidden' name='prefMemb'>
			</div>
			{!! BootForm::submit('Submit') !!}
			{!! BootForm::close() !!}
			<!-- <button type="submit" class="btn btn-primary">Submit</button>
			</form> -->
			<script type="text/javascript">
            function submitForm(){
            	var res = "";
            	var pref0 = document.getElementsByName("pref0");
            	for (i=0;i<pref0.length;i++){
					if(pref0[i].checked){
						res += pref0[i].value;
						break;
					}
				}
				var pref1 = document.getElementsByName("pref1");
            	for (i=0;i<pref1.length;i++){
					if(pref1[i].checked){
						res += pref1[i].value;
						break;
					}
				}
				var pref2 = document.getElementsByName("pref2");
            	for (i=0;i<pref2.length;i++){
					if(pref2[i].checked){
						res += pref2[i].value;
						break;
					}
				}
				var pref3 = document.getElementsByName("pref3");
            	for (i=0;i<pref3.length;i++){
					if(pref3[i].checked){
						res += pref3[i].value;
						break;
					}
				}

				document.getElementsByName("prefMemb")[0].value = res;
            	// alert(res);
            	return true;
            }
        </script>
    </div>
</div>
@endsection