<?php
namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends Controller
{

    public function mentions()
    {
        $text = Page::choosePageText('mentions');
        $head_title = Page::currentPageTitle('mentions');

        return view('mentions', compact('text', 'head_title'));
    }

    public function sitemap()
    {
        $text = Page::choosePageText('sitemap');
        $head_title = Page::currentPageTitle('sitemap');

        return view('sitemap', compact('text', 'head_title'))->with(trans('sitemap'));
    }

}
