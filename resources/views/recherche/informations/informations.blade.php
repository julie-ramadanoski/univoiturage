
<div class="container">
    <div class="content">
    
<div class="col-md-4">
   <div id="video"> <p id="titre">Vidéo de présentation</p>
        <iframe width="320px" height="200px" src="https://www.youtube.com/embed/q_KGM4pSKOw" frameborder="0" allowfullscreen></iframe>  
   </div>
</div>  
  
  <div class="col-md-4">
   <div id="video"><p id="titre">Informations conducteurs</p>
   <p id="texte"> Conducteurs : Réduisez vos frais de route

       Ne voyagez plus seul ! Economisez sur vos frais en prenant des passagers lors de vos longs trajets en voiture. </p>
       <ul class="nav navbar-nav" id="rechercher">
                        <li><a href="{{ url('/') }}">Rechercher un trajet</a></li>
                    </ul>
   </div>
</div> 
  
<div class="col-md-4">
   <div id="video"><p id="titre">Informations passagers</p>
      <p id="texte"> Passagers : Voyagez moins cher

Réservez facilement votre place en ligne et voyagez moins cher, même à la dernière minute ! </p>
  <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/trajet/add') }}">Proposer un trajet</a></li>

                    </ul>
   </div>
</div> 
    </div>
</div>
                         