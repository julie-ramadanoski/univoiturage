@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Detail du trajet </div>
{{--*/ 

    $prix = 0;
    $nbPlacePrises = 0;
    $nbPlacesMaxi = $trajet->vehicule->nbPlaceVeh;
   	$dist    = 0;
    $tps     = 0;       
    $moyTps  = 0;
    $moyDist = 0;

 /*--}}
 @for ($i = 1; $i < count($trajet->etapetrajets) -1 ; $i++) 

	{{--*/ 

        $dist += $trajet->etapetrajets[$i]->distEtapeTrajet;
        $tps  += $trajet->etapetrajets[$i]->dureeEtapeTrajet;
        $prix += $trajet->etapetrajets[$i]->prixEtapeTrajet;
        
        if ($nbPlacePrises < $trajet->etapetrajets[$i]->placePrisesEtapeTrajet){
                $nbPlacePrises = $trajet->etapetrajets[$i]->placePrisesEtapeTrajet;  
        }  

    
    /*--}}

@endfor


        	<div class="row">
        	<!-- Depart arrivee autoroute -->
	    		<div class="col-md-12">        			
		        	<p>
		        		{{ $trajet->etapetrajets[0]->etape->ville->nomVille }}
		                {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}
		                @if($trajet->autoRoutTraj == 1 && $trajet->autoRoutTraj != null)
							<img src="{{ URL::asset('/images/autoroute.jpg') }}" alt="prendre l autoroute">                             
		                @else
							<img src="{{ URL::asset('/images/nationnale.jpg') }}" alt="prendre la nationnale">

		                @endif
	            	</p>
	    		</div>
			</div>

			<div class="row">
	        	<div class="col-md-7">
	        		<div id="video">
	        			<p id="titre">Résumé du voyage</p>
					
						<p>Lieu de départ : {{ $trajet->etapetrajets[0]->etape->ville->nomVille }}</p>
		                <p>Lieu d'arrivée : {{ $trajet->etapetrajets[count($trajet->etapetrajets)-1]->etape->ville->nomVille }}</p>
		                <p>Date de départ : {{ $trajet->dateTraj }} à {{ $trajet->heureTraj }} H</p>
		                <!-- détail depart a l'heure ou différé -->
		                <p>Détails
		                	<div class="row">
		                		<div class="col-md-6">
		                			<p>
					                	@if($trajet->depaDecTraj == NULL || $trajet->depaDecTraj == 0)
					                		Départ pile à l'heure
					                	@else
					                		heure de départ fluctuante d'environ {{ $trajet->depaDecTraj }} minutes
										@endif
									</p>
									<p>
					                	@if($trajet->bagageTraj == NULL || $trajet->bagageTraj == 0)
					                		Pas de bagages
					                	@elseif($trajet->bagageTraj == 1)
					                		Bagage à main autorisé
					                	@elseif($trajet->bagageTraj == 2)
					                		Valise à main autorisé
										@endif
									</p>
									<p>
					                	@if($trajet->detoursTraj == NULL || $trajet->detoursTraj == 0)
					                		Pas de détours
					                	@else
					                		Détour de {{ $trajet->detoursTraj }} km possible
										@endif
									</p>
									<p>
					                	@if($trajet->infoTraj == NULL || $trajet->infoTraj == '')
					                		Le conducteur n'a pas déposé plus de détails à propos du trajet
					                	@else
					                		{{ $trajet->user->pseudoMemb }} précise : "{{ $trajet->infoTraj }}"
										@endif
									</p>

		                			
		                		</div>
		                	</div>
		                </p>
		    		</div>
	        	</div>

	        	<div class="col-md-5">
	        		<div id="video">
	        			<p id="titre"> {{ $trajet->tarifTraj or 0}} € par place  {{ $nbPlacesMaxi - $nbPlacePrises }}place(s) restantes</p>
						<!-- Nombre de place à réserver -->
						<p id="texte">
							<select>
								<option value="0">Nombre de places à réserver</option>
								@for ($i = 1; $i <=( $nbPlacesMaxi - $nbPlacePrises ) ; $i++) 
									<option value="{{ $i }}">{{ $i }} place(s)</option>
								@endfor
							</select>
							<input type="button" class="btn btn-primary" value="Réserver"/>
						</p>
		    		</div>
	        	</div>
	        	<div class="col-md-7">
					<div id="video">
	        			<p id="titre">Questions pour le conducteur</p>
					
						<p id="texte">
							<div class = "form-group">
						      <textarea class = "form-control" placeholder="Poser une question à {{ $trajet->user->pseudoMemb }}" rows="5"></textarea>
							  <input type="button" class="btn btn-primary" value="Poser ma question"/>
						   </div>
							
						   Vous aurez le numéro du conducteur après avoir réservé en ligne
						</p>
		    		</div>
	        	</div>
	        	<div class="col-md-5">
        			
	        		<div id="video">
	        			<p id="titre">Conducteur</p>
					
						<p id="texte">
							 <img src="{{ $trajet->user->photoMemb }}" alt="photo de profil" />
                                        
                                <p>{{ $trajet->user->name }} {{ $trajet->user->prenomMemb }}</p>
                                <p class="sexe" genre="{{ $trajet->user->sexeMemb }}">age {{{ $trajet->user->ageMemb or 'inconnu' }}} </p>
                                <p>level {{ $trajet->user->totAvisM or 'innonnu' }}</p>
                                
                                @for ($i = 0; $i < 8 ; $i=$i+2)                                
                                    <img src="{{ URL::asset('images/pref-'.substr($trajet->user->prefMemb,$i, 2)) }}.png" alt="préférence conducteur,">
                                @endfor 	
						</p>
	        		</div>
		    	</div>
        	</div>
 </div>
</div>
@endsection