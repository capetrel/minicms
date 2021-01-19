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
                    <div class="panel-heading"><h4>Editer une categorie</h4></div>
                    <hr>
                    <div class="panel-body">

                        @include('blocks.errors')

                        @include('blocks.messages')

                        {!! Form::open( ['url' => route('save-cat', ['page'=>$page]),'method' => 'post'] ) !!}

                            <div class="form-group">
                                {!! Form::label('category_name', 'Nom de la catégorie') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('category_name', false, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('category_slug', 'Slug de la catégorie') !!}
                                <em> ( Obligatoire ) </em>
                                {!! Form::text('category_slug', false, [
                                    'required',
                                    'class'=>'form-control'
                                    ])
                                !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                                <a class="btn btn-secondary" title="retour à la page précédente" href="{{ route('page', ['pages'  => $page]) }}">Annuler</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
