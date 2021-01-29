@extends('layouts.admin')

@section('content')

    @push('css')
        @if (env('APP_ENV') == 'local')
            <link rel="stylesheet" href="{{ asset('css/wysiwyg.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/wysiwyg.min.css') }}">
        @endif
    @endpush

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
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editer les textes de la page</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => route('update-page', ['page'=>$page]), 'method' => 'post']) !!}

                        @foreach($page_content as $content)

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('menu_name', 'Titre de la page :') !!}
                                        <em> ( Nom qui apparait dans les menus du site ) </em>
                                        {!! Form::text('menu_name', $content->menu_name, [
                                            'required',
                                            'class'=>'form-control'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('menu_order', 'Position dans le menu :') !!}
                                        <em> ( Ordre croissant de haut en bas ) </em>
                                        {!! Form::number('menu_order', $content->menu_order, [
                                            'required',
                                            'class'=>'form-control'])
                                        !!}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('url_name', 'Nom de la page dans l\'url :') !!}
                                <em> ( Pas d'accents ni majuscule ) </em>
                                {!! Form::text('url_name', $content->url_name, [
                                    'required',
                                    'class'=>'form-control' ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('head_title', 'Description de la page :') !!}
                                <em> ( Titre dans l'onglet du navigateur ) </em>
                                {!! Form::text('head_title', $content->head_title, [
                                    'required',
                                    'class'=>'form-control'])
                                !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('text', 'Contenu :') !!}
                                {!! Form::textarea('text', $content->text, [
                                    'class'=>'form-control',
                                    'id'=>'editor'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ route('page', ['page'  => $content->url_name]) }}">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/wysiwyg.js') }}"></script>
    @endpush

@endsection
