<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        /*
         * $left_menu = Page::getMenu('left');
        $bottom_menu = Page::getMenu('bottom');
        $right_menu = Page::getMenu('right');
        $site_meta = Config::getSiteMeta(1);

        view()->share('site_meta', $site_meta);
        view()->share('left_menu', $left_menu);
        view()->share('right_menu', $right_menu);
        view()->share('bottom_menu', $bottom_menu);
        */

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
