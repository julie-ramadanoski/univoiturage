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
    Créer une base de donnée locale et mettez les identifiant ainsi que la clé locale dans  .env
    >php artisan serve pour lancer l'appli sur http://localhost:8000/
	
## Configurer GIT
	>git remote add upstream https://github.com/julie-ramadanoski/univoiturage

## Branche de développement d'une fonctionnalité
	
	Dans le dépôt local
	>git checkout -b mafonctionnalite

Faire des modifications
	>git add ./mesfichiersCréé ou modifiés
	>git commit -m "mon message explicatif"

	Une fois la fonctionnalité terminée
	>git push --set-upstream origin mafonctionnalite

## Récupération des modification du dépôt distant
	Avant de commencer à travailler mettez-vous à jour
	>git pull

## Fusion des modifications de sa branche de dev vers master
	Se positionner sur sa branche master
	>git checkout master
	>git merge mafonctionnalite
	Régler les conflits au besoin
	L'inverse est possible



## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
