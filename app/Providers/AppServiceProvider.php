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
        view()->composer('*', 'App\Http\Composers\SiteComposer@showLechimMenu');
        view()->composer('*', 'App\Http\Composers\SiteComposer@showInnerNewsMenu');
        view()->composer('*', 'App\Http\Composers\SiteComposer@showNewsFooter');

        view()->composer('*', 'App\Http\Composers\SiteComposer@headerAbout');
        view()->composer('*', 'App\Http\Composers\SiteComposer@headerCatalog');
        view()->composer('*', 'App\Http\Composers\SiteComposer@headerLechim');
        view()->composer('*', 'App\Http\Composers\SiteComposer@headerProfilaktor');
        view()->composer('*', 'App\Http\Composers\SiteComposer@reviews');
    }
}