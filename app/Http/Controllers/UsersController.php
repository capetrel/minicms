<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(string $page, int $id)
    {

        $page_content = Page::getContent('user');
        $user = User::getUserInfo($id);

        return view('admin.edit.user', compact( 'user', 'page_content'));

    }
}
