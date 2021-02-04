<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robot" content="index, follow, all"/>

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">

    @if (env('APP_ENV') == 'local')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    @endif

    @stack('css')

    <title>Erreur 401</title>

</head>
<body>
    <div class="wrapper">

        <nav>

            @include('blocks.leftnav')

        </nav>

        <article id="main">

            <header class="bg-primary text-white jumbotron">
                <div class="container text-center">
                    <h1 class="display-4">
                        Erreur 401
                    </h1>
                </div>
            </header>

            <div class="custom-content">
                <p><strong>Accès non autorisé.</strong></p>
            </div>

        </article>

    </div>

    @include('blocks.footer')

</body>
</html>
