@extends('layouts.admin')

@section('content')

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
                    <div class="panel-heading"><h4>Editer la configuration du site</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['url' => route('update-config'), 'method' => 'post']) !!}

                        @foreach($config_content as $content)

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('site_name', 'Nom du site : *') !!}
                                        {!! Form::text('site_name', $content->site_name, [
                                            'required',
                                            'class'=>'form-control'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('site_slogan', 'Slogan : *') !!}
                                        {!! Form::text('site_slogan', $content->site_slogan, [
                                            'required',
                                            'class'=>'form-control'])
                                        !!}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('site_url', 'Url du site : *') !!}
                                {!! Form::text('site_url', $content->site_url, [
                                    'required',
                                    'class'=>'form-control' ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('site_keywords', 'Mot clés (séparé par une virule) : *') !!}
                                <em> ( Pour les moteurs de recherche ) </em>
                                {!! Form::text('site_keywords', $content->site_keywords, [
                                    'required',
                                    'class'=>'form-control'])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('site_description', 'Description du site : *') !!}
                                <em> ( Pour les résultats des moteurs de recherche ) </em>
                                {!! Form::textarea('site_description', $content->site_description, [
                                    'required',
                                    'class'=>'form-control'])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="/admin">Annuler</a>
                            </div>

                        @endforeach

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
