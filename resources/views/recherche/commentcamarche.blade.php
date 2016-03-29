@extends('recherche')

@section('content')

<div class="container">
    <div class="content">
        <div class="title">Comment ça marche?</div>
                         
                         
                  <ul class="nav nav-tabs" role="tablist" id="fen">
                    <li role="presentation" class="active" id="fen"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h2>Vous êtes passager?</h2>
              <h4>>Réservez votre place</h4></a></li>
                   
                    <li role="presentation" id="fen2"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h2>Vous êtes passager?</h2>
              <h4>>Réservez votre place</h4></a></li>
                  </ul>

        <div id="txtfix"> <p>Simple et économique: réservez facilement votre place en ligne et voyagez moins cher, en toute confiance. Même à la dernière minute! </p></div>
       
        <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                
         <div id="listepassager">
             <ul id="txt">
                 <li>Recherchez votre trajet</li>
                 <div>Entrez vos villes de départ et de destination, ainsi que votre date de voyage et choisissez parmi les conducteurs proposant des trajets qui vous conviennent. Si vous voulez des précisions sur un trajet, vous pouvez envoyer un message au conducteur</div>
                 
                 <li>Réservez et payez directement au chaufeur</li>            
                 <div>Vous réservez votre place en ligne et recevez un Code de Réservation. Votre conducteur est prévenu immédiatement de votre réservation par mail et SMS. Ensuite, appelez le conducteur pour régler les derniers détails du voyage de vive voix.</div>
                 
                 <li>Voyagez</li>
                 <div>Rendez-vous au lieu de départ convenu, bien à l'heure. Donnez votre Code de Réservation au conducteur au cours du voyage, cela lui permettra de recevoir votre participation au trajet par la suite. Bonne route !</div>
             </ul>   
    
             <ul id="astuce">
                 <div>Consultez le profil vérifié des conducteurs: photo, bio et avis. </div>  
                 
                 <div>Bien sûr, si vous avez un empêchement, vous disposez de conditions d'annulation.</div>            
                 
                 <div>Après le voyage, laissez un avis à votre conducteur, afin d'en recevoir un en retour, et d'augmenter votre niveau d'expérience.                  </div>
             </ul>   
         </div>
          </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">         
            
            <div id="listeconducteur">
             <ul id="txt">
                 <li>Recherchez votre trajet</li>
                 <div>Entrez vos villes de départ et de destination, ainsi que votre date de voyage et choisissez parmi les conducteurs proposant des trajets qui vous conviennent. Si vous voulez des précisions sur un trajet, vous pouvez envoyer un message au conducteur</div>
                 
                 <li>Réservez et payez directement au chaufeur</li>            
                 <div>Vous réservez votre place en ligne et recevez un Code de Réservation. Votre conducteur est prévenu immédiatement de votre réservation par mail et SMS. Ensuite, appelez le conducteur pour régler les derniers détails du voyage de vive voix.</div>
                 
                 <li>Voyagez</li>
                 <div>Rendez-vous au lieu de départ convenu, bien à l'heure. Donnez votre Code de Réservation au conducteur au cours du voyage, cela lui permettra de recevoir votre participation au trajet par la suite. Bonne route !</div>
             </ul>   
    
             <ul id="astuce">
                 <div>Consultez le profil vérifié des conducteurs: photo, bio et avis. </div>  
                 
                 <div>Bien sûr, si vous avez un empêchement, vous disposez de conditions d'annulation.</div>            
                 
                 <div>Après le voyage, laissez un avis à votre conducteur, afin d'en recevoir un en retour, et d'augmenter votre niveau d'expérience.                  </div>
             </ul>   
         </div>
               </div>
                </div>
          
           </div>
</div>

<!--     <div id="fen">
              <h2>Vous êtes passager?</h2>
              <h4>>Réservez votre place</h4>
          </div>
          
          <div id="fen2">
              <h2>Vous êtes passager?</h2>
              <h4>>Réservez votre place</h4>
          </div> -->
@endsection