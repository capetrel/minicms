<div class="card">
    <div class="card-header">
        Éléments de contenus
    </div>
    <ul class="list-group list-group-flush">
        @if( url()->current() === url('admin/categories'))
            <li class="list-group-item active">Catégories</li>
        @else
            <a class="nav-link" href="{{ url('admin/categories') }}" title="Aller à la page : Catégories">Catégories</a>
        @endif
    </ul>
</div>
