Bonjour {{$user->prenomMemb}} {{$user->name}}, 
veuillez cliquer sur ce lien pour redéfinir votre mot de passe : {{ url('password/reset/'.$token) }}