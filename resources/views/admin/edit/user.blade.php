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
                    <div class="panel-heading"><h4>Editer l'utilisateur</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['route' => ['update-user', $user->id], 'method' => 'post']) !!}

                            {{ Form::hidden('id', $user->id) }}

                            <div class="form-group">
                                {!! Form::label('firstname', 'Prénom *') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('firstname', $user->firstname, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('lastname', 'Nom *') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('lastname', $user->lastname, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Nom d\'utilsateur *') !!}<em> ( Obligatoire ) </em>
                            {!! Form::text('name', $user->name, [
                                'required',
                                'class'=>'form-control'
                                ])
                            !!}
                        </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Courriel') !!}<em> ( Obligatoire ) </em>
                                {!! Form::email('email', $user->email, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="/admin">Annuler</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
