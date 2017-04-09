<?php

namespace OurHouse\Providers;

use Illuminate\Support\ServiceProvider;
use OurHouse\Models\Maintenance\RecurringTask;
use OurHouse\Models\Observers\RecurringTaskObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        RecurringTask::observe(RecurringTaskObserver::class);
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
}
