<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->composeSite();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeSite()
    {
        view()->composer('*', 'App\Http\Composers\SiteComposer@showSlugRatings');
        view()->composer('*', 'App\Http\Composers\SiteComposer@showNewsMenu');
        view()->composer('*', 'App\Http\Composers\SiteComposer@meta');
    }
}