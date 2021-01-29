<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicons/favicon.png') }}" type="image/png">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicons/favicon-32.png') }}" type="image/png">
    <link rel="icon" sizes="64x64" href="{{ asset('img/favicons/favicon-64.png') }}" type="image/png">
    <link rel="icon" sizes="96x96" href="{{ asset('img/favicons/favicon-96.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="icon" sizes="196x196" href="{{ asset('img/favicons/favicon-196.png') }}" type="image/png">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/favicon-144.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    @stack('css')

</head>
<body>
<div id="master">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin') }}">
                Accueil
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('login.Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" target="_blank">Voir le site</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <div>{{ __('login.Enter your credentials') }}</div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin') }}">
                                    Mon profil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('login.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <article id="main">


            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Éléments du site
                            </div>
                            <ul class="list-group list-group-flush">
                                @include('admin.blocks.navleft')
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header"><h4>Erreur</h4></div>

                            <div class="card-body">
                                <div class="custom-title">
                                    <h1>
                                        Erreur 422
                                    </h1>
                                </div>
                            </div>

                        </div>
                        <br>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Il y a eu une erreur</h4>
                            </div>
                            <div class="panel-body">

                                <div class="custom-content">
                                    @if($error === 0)
                                        <p><strong>Le ficher est vraiment trop volumineux </strong><a href="{{ route('admin', ['pages' => 'medias']) }}">Essayer avec un autre fichier</a></p>
                                    @else
                                        <p><strong>erreur inconnue </strong><a href="{{ route('admin') }}">Retourner à la page d'accueil</a></p>
                                        <p><a href="mailto:capetrel@yahoo.fr">ou signaler le problème à l'administrateur du site</a></p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    </main>
</div>
@stack('scripts')
<script src="{{ asset('/js/master.js') }}"></script>
</body>
</html>
