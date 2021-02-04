@extends('layouts.site')

@section('content')

    @push('css')
        @if (env('APP_ENV') === 'local')
            <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/slider.min.css') }}">
        @endif
    @endpush

    <div class="formated-content">
        {!! $text->text !!}
    </div>

    @foreach($media_from_category as $cat=>$media)

        <div class="media-section">
            <h2>{{ $cat }}</h2>
            <div class="slider slider-{{ Str::slug($cat) }}">
                @foreach($media_from_category[$cat] as $media)
                    <div class="slide">
                        <a href="{{ is_null($media->media_link) ? '#' : $media->media_link }}" class="slide_link {{ is_null($media->media_link) ? '' : "has-link" }}" target="_blank">
                            <div class="img">
                                <img id="imgSrc" src="{{ asset($media->media_thumb) }}" alt="{{ $media->media_title }}">
                            </div>
                            <div class="info">
                                <h3 id="imgTitle">{{ $media->media_title }}</h3>
                                <p id="imgDesc" class="desc">{{ Str::limit($media->media_description, 100, '...') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    @endforeach

    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <img src="" class="modal-content" id="modalImg">
        <h3 id="modalTitle"></h3>
        <div id="modalDesc"></div>
    </div>

    @push('scripts')
        @if (env('APP_ENV') === 'local')
            <script src="{{ asset('js/slider.js') }}"></script>
        @else
            <script src="{{ asset('js/slider.min.js') }}"></script>
        @endif
    @endpush

@endsection
