<?php
namespace App\Http\Controllers;

use App\Models\Page;

class WelcomeController extends Controller
{
    public function index()
    {

        $text = Page::choosePageText('presentation');
        $page_meta = Page::currentPageMeta('presentation');

        return view('welcome', compact('text', 'page_meta'));
    }

}
