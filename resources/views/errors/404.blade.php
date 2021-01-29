<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="robot" content="index, follow, all"/>

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">

    @if (env('APP_ENV') == 'local')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    @endif

    @stack('css')

    <title>Erreur 404</title>

</head>
<body>

<div class="wrapper">

    <nav>

        @include('blocks.leftnav')

    </nav>

    <article id="main">

        <header>

            <div class="custom-title">

                <h1>
                    Erreur 404
                </h1>

            </div>
            <div class="logo">
                <img class="img-responsive" src="{{ asset('svg/logo-duoalborada.svg') }}" alt="Logo du Duo Alborada">
            </div>

        </header>

        <div class="custom-content">
            <p><strong>Cette page n'existe pas.</strong></p>
        </div>

    </article>

</div>

@include('blocks.footer')

</body>
</html>
