<?php
namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends Controller
{

    public function mentions()
    {
        $text = Page::choosePageText('mentions');
        $page_meta = Page::currentPageMeta('mentions');

        return view('mentions', compact('text', 'page_meta'));
    }

    public function sitemap()
    {
        $text = Page::choosePageText('sitemap');
        $page_meta = Page::currentPageMeta('sitemap');

        return view('sitemap', compact('text', 'page_meta'))->with(trans('sitemap'));
    }

}
