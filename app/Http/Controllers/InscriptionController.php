//valideInscrit
	1 = incript
	0 = pas inscrit

//reservation passée : $trajet->dateTraj > $now

si on l'accepte : on passe à 1
si on le refuse : on supprime la candidature


dans l'historique des réservations :
	afficher :
		- reservations future où l'on a demander
		- reservations passées où l'on a été acceptés

dans l'historique des trajets : 
	afficher :
		- trajet passée : personnes à 1
		- trajet futur : laisser comme c'est

lorsque l'on s'inscrit :
	- créer réservation avec attribut à 0