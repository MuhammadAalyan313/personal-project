<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\LeadObserver;
use App\Models\Lead;


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
        Lead::observe(LeadObserver::class);

    }
}
