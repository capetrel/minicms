<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ is_null($page_meta->head_meta_keywords) ? $site_meta->site_keywords : $page_meta->head_meta_keywords }}" />
    <meta name="description" content="{{ is_null($page_meta->head_meta_description) ? $site_meta->site_description : $page_meta->head_meta_description }}" />
    <meta name="robot" content="index, follow, all"/>

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">

    @if (env('APP_ENV') == 'local')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    @endif

    @stack('css')

    <title>{{ is_null($page_meta->head_title) ? env('APP_NAME') : $page_meta->head_title }}</title>

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
