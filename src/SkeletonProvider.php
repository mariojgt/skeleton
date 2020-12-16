<?php
namespace Mariojgt\Skeleton;

use Illuminate\Support\ServiceProvider;

class SkeletonProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load skeleton views
        $this->loadViewsFrom(__DIR__.'/views', 'skeleton');
        // load skeleton routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publish();
    }

    public function publish()
    {
        //publish the npm case we need to do soem developent
        // $this->publishes([
        //     __DIR__.'/../Publish/Npm/' => base_path()
        // ]);

        // publish the resource in case we need to compile
        // $this->publishes([
        //     __DIR__.'/../Publish/Resource/' => resource_path('vendor/Peach/')
        // ]);

        // publish the public folder
        // $this->publishes([
        //     __DIR__.'/../Publish/' => public_path('vendor/Peach/')
        // ]);
    }
}
