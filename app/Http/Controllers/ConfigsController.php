<?php

namespace App\Http\Controllers;

use App\Http\Request\ConfigsFormRequest;
use App\Models\Config;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{

    public function edit()
    {
        $config_content = Config::all();

        return view('admin.edit.configs', compact('config_content'));
    }

    public function update(ConfigsFormRequest $request)
    {
        $datas =$request->all();
        $user_data = User::getUserInfo(Auth::id());

        try{

            Config::updateConfig($datas, 1);
            $site_config = Config::getConfig();
            $edit_pages = [
                'edit_page' => 'page',
                'edit_user' => 'user',
            ];
            Session::flash('message', 'La configuration à bien été mis à jour');

            return view('admin.home', compact('user_data', 'site_config', 'edit_pages'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }
}
