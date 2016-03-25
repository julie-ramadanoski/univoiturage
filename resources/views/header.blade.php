
@extends('index')

@section('header')
	<!--
	<nav class="navbar navbar-default">
>>>>>>> master:resources/views/header.blade.php
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Car à fond</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Université</a></li>
                    </ul>
                       <ul class="nav navbar-nav" id="rechercher">
                        <li><a href="{{ url('/') }}">Rechercher un trajet</a></li>
                    </ul>
                       <ul class="nav navbar-nav" id="proposer">
                        <li><a href="{{ url('/') }}">Proposer un trajet</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(auth()->guest())
                            @if(!Request::is('auth/login'))
                                <li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
                            @endif
                            @if(!Request::is('auth/register'))
                                <li><a href="{{ url('/auth/register') }}">S'enregistrer</a></li>
                            @endif
                            <li><a href="">Comment ça marche?</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
<<<<<<< HEAD:resources/views/profil.blade.php
                                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                                    <li><a href="{{ url('/auth/logout') }}">Déconnexion</a></li>
=======
                                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
>>>>>>> master:resources/views/header.blade.php
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    -->
@endsection