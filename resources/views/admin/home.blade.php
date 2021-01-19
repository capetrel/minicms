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
                @include('admin.blocks.categorynavleft')
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h4>Tableau de bord</h4></div>
                    <div class="card-body">

                        @include('admin.blocks.session')

                        <h5 class="card-title" >Bonjour Maître {{ $user_data->firstname }} {{ $user_data->lastname }}</h5>
                        <p class="card-text">
                            <strong>Les informations vous concernant :</strong>
                        </p>
                            <ul class="card-text">
                                <li>Prénom : {{ $user_data->firstname }}</li>
                                <li>Nom : {{ $user_data->lastname }}</li>
                                <li>Email : {{ $user_data->email }}</li>
                            </ul>

                    </div>
                </div>
                <br>
                <hr>
            </div>

        </div>
    </div>
@endsection
