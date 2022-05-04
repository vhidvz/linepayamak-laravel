<?php

namespace LinePayamak\Support\Laravel;

use LinePayamak\Support\Service;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/linepayamak.php', 'linepayamak');

        $this->app->singleton('LinePayamak', function ($app) {
            return new Service(config('linepayamak'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/linepayamak.php' => config_path('linepayamak.php')
        ]);
    }
}
