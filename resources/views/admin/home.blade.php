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
                    <div class="card-header"><h1>Tableau de bord</h1></div>
                    <div class="card-body">

                        @include('admin.blocks.session')

                        <h2 class="card-title" >Bonjour Maître {{ $user_data->firstname }} {{ $user_data->lastname }}</h2>
                        <p class="card-text">
                            <strong>Les informations vous concernant :</strong>
                        </p>
                        <ul class="card-text">
                            <li>Prénom : {{ $user_data->firstname }}</li>
                            <li>Nom : {{ $user_data->lastname }}</li>
                            <li>Email : {{ $user_data->email }}</li>
                        </ul>
                        <a href="{{ route('edit-user', ['page' => $edit_pages['edit_user'], 'id' => $user_data->id]) }}" class="btn btn-info">
                            <span class="oi oi-pencil" aria-hidden="true" title="modifier l'utilisateur">Modifier</span>
                        </a>
                        <br>
                        <hr>

                        <h2 class="card-title" >Informations concernant le site :</h2>
                        <p class="card-text">
                            <strong>Nom du site :</strong><br>
                            {{ $site_config->site_name }}
                        </p>

                        <p class="card-text">
                            <strong>Slogan :</strong><br>
                            {{ $site_config->site_slogan }}
                        </p>

                        <p class="card-text">
                            <strong>url :</strong><br>
                            {{ $site_config->site_url }}
                        </p>

                        <p class="card-text">
                            <strong>Mots clé de la balise meta "keywords":</strong><br>
                            {{ $site_config->site_keywords }}
                        </p>

                        <p class="card-text">
                            <strong>Contenu de la balise meta "description":</strong><br>
                            {{ $site_config->site_description }}
                        </p>
                        <a href="{{ route('edit-config') }}" class="btn btn-info">
                            <span class="oi oi-pencil" aria-hidden="true" title="modifier la configuration">Modifier</span>
                        </a>
                    </div>
                </div>
                <br>
                <hr>
            </div>

        </div>
    </div>
@endsection
