<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Page;

class PagesController extends Controller
{

    public function index()
    {

        $text = Page::choosePageText('presentation');
        $page_meta = Page::currentPageMeta('presentation');

        return view('welcome', compact('text', 'page_meta'));
    }

    public function medias()
    {
        $text = Page::choosePageText('medias');
        $page_meta = Page::currentPageMeta('medias');
        $media_from_category = Media::getMediasFromCategory();

        return view('medias', compact('text', 'page_meta', 'media_from_category'));
    }

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

        return view('sitemap', compact('text', 'page_meta'));
    }

}
