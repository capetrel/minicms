<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach($left_menu as $item)
                    @if( url()->current() === url($item->url_name))
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url($item->url_name) }}" title="Aller à la page : {{ $item->menu_name }}">{{ $item->menu_name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ url()->current() === url('/') && $item->url_name === 'presentation' ? 'active' :'' }}" href="{{ url($item->url_name) }}" title="Aller à la page : {{ $item->menu_name }}">{{ $item->menu_name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
