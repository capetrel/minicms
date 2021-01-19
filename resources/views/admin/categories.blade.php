<a class="btn btn-primary" href="{{ route('add-cat', ['page' => $page]) }}" title="Ajouter une catégorie">
    Ajouter une catégorie
</a>
,&nbsp;ou modifier une catégorie existante ci-dessous :
<br>
<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                Nom
            </th>
            <th>
                Slug
            </th>
            <th colspan="2">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="tab-content">
            @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->category_name }}
                    </td>
                    <td>
                        {{ $category->category_slug }}
                    </td>
                    <td>
                    {!! Form::open(['url' => route('del-cat', ['page' => $page, 'id' => $category->id]), 'method' => 'post', "onsubmit" => "return confirm('êtes vous sur ?')"]) !!}
                        <button type="submit" class="btn btn-danger" title="supprimer la catégorie">
                            <i class="oi oi-trash"></i>
                        </button>
                    {!! Form::close() !!}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('edit-cat', ['page' => $page, 'id' => $category->id]) }}" title="modifier la catégorie">
                            <span class="oi oi-pencil" aria-hidden="true" title="modifier la catégorie"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
