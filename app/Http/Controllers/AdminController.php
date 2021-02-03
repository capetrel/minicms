<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Page;
use App\Models\Media;
use App\Models\User;
use App\Http\Request\PagesFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $site_config = Config::getConfig();
        $user_data = User::getUserInfo(Auth::id());
        $edit_pages = [
            'edit_page' => 'page',
            'edit_user' => 'user',
        ];
        return view('admin.home', compact('user_data', 'site_config', 'edit_pages'));
    }

    public function show($page)
    {
        $page_content = Page::getContent($page);
        $categories = Category::getCategories();
        $media_from_category = Media::getMediasFromCategory();

        return view('admin.welcome', compact( 'page_content', 'categories', 'media_from_category', 'page'));

    }

    public function edit(string $page)
    {
        $page_content = Page::getEditContent($page);

        return view('admin.edit.pages', compact( 'page_content', 'page'));
    }

    public function update(PagesFormRequest $request, $page)
    {
        $data = $request->all();
        try{

            Page::updatePage($data, $page);
            $page_content = Page::getContent($page);

            return view('admin.welcome', compact('page_content', 'page'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }
}
