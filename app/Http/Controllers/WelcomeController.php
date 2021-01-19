<?php
namespace App\Http\Controllers;

use App\Models\Page;

class WelcomeController extends Controller
{
    public function index()
    {

        $text = Page::choosePageText('presentation');
        $head_title = Page::currentPageTitle('presentation');

        // dd($head_title);
        return view('welcome', compact('text', 'head_title'));
    }

}
