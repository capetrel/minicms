@extends('layouts.site')

@section('content')
    <div class="post">
        <h1>{{ $media->media_title }}</h1>
        <div class="post-info">
            <p class="lead">
                <strong>{{ $media->category_name }}</strong> {{ $media->media_date }}
            </p>
        </div>
        <img class="img-fluid" src="{{ $media->media_fullsize }}" alt="{{ $media->media_title }}">
        <div class="formated-content">
            {!! $media->media_description !!}
        </div>
    </div>
@endsection
