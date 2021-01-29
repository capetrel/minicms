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
                    <div class="panel-heading"><h4>Editer l'utilisateurs</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open(['route' => ['update-user',$page_content, $user->id], 'method' => 'post']) !!}

                            {{ Form::hidden('id', $user->id) }}

                            <div class="form-group">
                                {!! Form::label('user_firstname', 'Prénom') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('user_firstname', $user->firstname, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('user_lasttname', 'Nom') !!}<em> ( Obligatoire ) </em>
                                {!! Form::text('user_lasttname', $user->firstname, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('user_email', 'Nom') !!}<em> ( Obligatoire ) </em>
                                {!! Form::mail('user_email', $user->email, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ route('page', ['page'  => $page]) }}">Annuler</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
