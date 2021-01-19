<ul class="list-unstyled list-inline">
    @foreach($bottom_menu as $item)
        @if($item->url_name !== 'login')
            <li class="list-inline-item">
                <a href="{{ url($item->url_name) }}" title="{{ $item->menu_name }}">{{ $item->menu_name }}</a>
            </li>
        @endif
    @endforeach
    @auth
        <li class="list-inline-item">
            <a href="{{ route('admin') }}">Acceuil</a>
        </li>
    @else
        <li class="list-inline-item">
            <a href="{{ route('login') }}">Maître</a>
        </li>
    @endauth
</ul>
