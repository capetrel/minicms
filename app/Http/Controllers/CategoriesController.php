<?php
namespace App\Http\Controllers;

use App\Http\Request\CategoryFormRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categories()
    {
        $categories = Category::getCategories();

        return view('categories', compact('text', 'page_meta', 'categories'));
    }

    public function edit(string $page, int $id)
    {
        $category = Category::getCategory($id);

        return view('admin.edit.category', compact( 'category', 'page', 'id'));
    }

    public function update(CategoryFormRequest $request, string $page, int $id)
    {
        $datas =$request->all();

        try{

            Category::updateCategory($datas, $id);

            $category = Category::getCategory($id);

            Session::flash('message', 'La categorie a bien été mis à jour');

            return view('admin.edit.category', compact( 'category','page', 'id'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form(string $page)
    {
        return view('admin.add.category', compact('page'));
    }

    public function add(CategoryFormRequest $request, string $page)
    {

        $datas =$request->all();

        $get_page_id = Page::getPageId($page);

        $page_id = $get_page_id->all()[0]->id;

        $datas['page_id']= $page_id;

        return redirect('admin/' . $page);
    }


    public function del(string $page, int $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/' . $page);
    }

}
