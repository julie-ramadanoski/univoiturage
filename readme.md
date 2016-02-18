# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).
## Tutoriel alternatif 
Sur [graphikart](https://www.youtube.com/watch?v=WWfIDrGaFIw&list=PLjwdMgw5TTLUCpXVEehCHs99N7IWByS3i) vous trouverez une suite de tutoriel pour toutes les étapes du développment de l'application
Créer des routes, controllers, models, BDD, vues, gérer l'authentification...

## Git tutoriel [Guide](https://git-scm.com)
Git va nous permettre de versionner le projet en travaillant simultanément sur le projet sans nous géner.
Pour se faire Veillez à séparer vos commits comme ajouter un controller ne sera pas dans le même que modifier la vue.

## Installation locale
    >git clone https://github.com/julie-ramadanoski/univoiturage
    >cd projectname
    >composer install
    >php artisan key:generate

    Créer une base de donnée locale 
    >mettez les identifiants ainsi que la clé locale dans le fichier .env
    >php artisan serve pour lancer l'appli sur http://localhost:8000/

## Générer le jeu d'essai
	Mettez à jour composer :
	>composer dump-autoload
	la base de donnée doit être vide pour pouvoir recréer toute la base :
	>php artisan migrate --seed
	Après des tests, supprimer ses entrées
	>php artisan migrate:refresh --seed
	
## Configurer GIT
	>git remote add upstream https://github.com/julie-ramadanoski/univoiturage

## Branche de développement d'une fonctionnalité
	Dans le dépôt distant (GitHub)
	>Créer une nouvelle branche
	Dans le dépôt local
	>git checkout -b mafonctionnalite
	>git commit -m "mon premier commit"
	>git push --set-upstream origin mafonctionnalite

Faire des modifications
	>git add ./mesfichiersCréé ou modifiés
	>git push

Une fois la fonctionnalité terminée, dans GitHub allez sur votre branche et cliquez sur "pullRequest"

## Récupération des modifications du dépôt distant
	Avant de commencer à travailler mettez-vous à jour
	>git pull

## Fusion des modifications de sa branche de master vers mafonctionnalite
	Se positionner sur sa branche mafonctionnalite
	>git checkout mafonctionnalite
	>git merge master
	Régler les conflits au besoin

## Intégrer des ressources scripts js ou css
	Dans le répertoire resources/assets contient un répertoire sass/app.sass
	Il est possible de créer une arborescence contenant assets/css et assets/js pour permettre à laravel de les gérer et les implémenter dans le dossier public
	Le plus dur est d'installer les librairies dans le projet : mettre a jour node.js et/ou composer
	>npm install npm@latest -g
	Et lancer l'installation des dépendances de Laravel
	>npm install
	Et si vous avez des erreurs installer gulp et laravel-elixir
	>npm install gulp -g
	>npm install laravel-elixir

	Dans le fichier gulpfile.js indiquer ce que vous voulez faire de vos scripts (compiler, fusionner ou juste copier)
	[Guide Laracast Video](https://laracasts.com/series/laravel-5-from-scratch/episodes/6?autoplay=true)
	[Guide Laravel](https://laravel.com/docs/master/elixir#plain-css)
	Exemple 
	>elixir(function(mix) {
	>    mix.sass('app.scss');
	>    mix.copy('resources/assets/js/bootstrap-datepicker.js', 'public/js/bootstrap-datepicker.js');
	>    mix.copy('resources/assets/js/jquery.min.js','public/js/jquery.min.js' );
	>    mix.copy('resources/assets/css/datepicker.css', 'public/css/datepicker.css');
	>});


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
