<?php

namespace Suunnn\LaravelRongcloud;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use RongCloud\RongCloud;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @author suunnn
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/rongcloud.php', 'rongcloud');

        $this->app->singleton(RongCloud::class, function () {
            return new RongCloud(config('rongcloud.app_key'), config('rongcloud.app_secret'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @author suunnn
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__) . '/config/rongcloud.php' => config_path('rongcloud.php')
        ], 'laravel-rongcloud');
    }

    /**
     * Get services.
     *
     * @author suunnn
     *
     * @return string[]
     */
    public function provides()
    {
        return [RongCloud::class];
    }
}
