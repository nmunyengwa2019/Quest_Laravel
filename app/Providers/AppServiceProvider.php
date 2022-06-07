<?php

namespace App\Providers;
use App\Models\Group;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('recentGroups', Group::orderBy('created_at','desc')->take(3)->get());
    }
}
