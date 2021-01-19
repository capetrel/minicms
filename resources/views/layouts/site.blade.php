<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Duo de guitare classique espagnole en région centre, le Duo Alborada." />
    <meta name="keywords" content="Duo, Alborada, guitare, classique, espagnole, festival, musique, guitare, voyage guitare,animation musique, projet pedagogique, region centre, centre, indre et loire, 37,tours, Festival Voyage au Centre de la Guitare," />
    <meta name="robot" content="index, follow, all"/>
    <meta name="author" content="capetrel" />
    <meta name="Identifier-URL" content="http://www.duoalborada.com" />
    <meta name="Copyright" content="@ capetrel" />

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/owlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owlCarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.min.css') }}">

    @stack('css')

    <title> {{ $head_title->head_title }}</title>

</head>


<body id="page-top">

    <!-- Navigation -->
    @include('blocks.leftnav')

    @include('blocks.header')

    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @include('blocks.footer')

</body>
</html>
