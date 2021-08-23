<?php

namespace Aoeng\laravel\Admin\Banner;

use Illuminate\Support\ServiceProvider;

class BannerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/laravel-admin-banner/');
        $this->loadRoutesFrom(__DIR__ . '/laravel-admin-banner/');
        $this->loadRoutesFrom(__DIR__ . '/laravel-admin-banner/');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
