<?php

namespace App\Http\Controllers;

use App\Http\Request\UserFormRequest;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(int $id)
    {

        $page_content = Page::getContent('user');
        $user = User::getUserInfo($id);

        return view('admin.edit.user', compact( 'user', 'page_content'));

    }

    public function update(UserFormRequest $request)
    {
        $data =$request->all();
        $user_data = User::getUserInfo(Auth::id());

        try{
            User::updateUser($data, $user_data->id);
            return redirect()->route('admin');
        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }
}
