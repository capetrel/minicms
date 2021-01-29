<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;

class UsersController extends Controller
{
    public function show($page, $id)
    {

        $page_content = Page::getContent('user');
        $user = User::getUserInfo($id);

        return view('admin.edit.user', compact( 'user', 'page_content'));

    }
}
