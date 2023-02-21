<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\ArticleCategory;
use App\Social;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);


        // Share view for Common Data
        $settings = Setting::where('status', '1')->get();
        $socials = Social::where('status', '1')->get();
        $article_submenus = ArticleCategory::where('status', '1')->get();


        View::share(['settings' => $settings, 'article_submenus' => $article_submenus, 'socials' => $socials]);

    }
}
