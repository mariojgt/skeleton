<?php

namespace Mariojgt\Skeleton;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Mariojgt\Skeleton\Commands\Install;
use Mariojgt\Skeleton\Commands\Republish;
use Mariojgt\Skeleton\Events\UserVerifyEvent;
use Mariojgt\Skeleton\Listeners\SendUserVerifyListener;

class SkeletonProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Event for when you create a new user
        Event::listen(
            UserVerifyEvent::class,
            [SendUserVerifyListener::class, 'handle']
        );

        // Load some commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Republish::class,
                Install::class,
            ]);
        }

        // Loading Custom middlewhere
        $this->app['router']->aliasMiddleware(
            'boot_token',
            \Mariojgt\Skeleton\Middleware\BootTokenApi::class
        );

        // Load skeleton views
        $this->loadViewsFrom(__DIR__ . '/views', 'skeleton');

        // Load skeleton routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/auth.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
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
        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Config/' => config_path(''),
        ]);

        // Render Type
        $renderType = config('skeleton.inertiajs_enable') ?? true;

        // Inersia js
        if ($renderType) {
            $prefix_blade = 'inertiajs';

            // Publish the kernel stuff
            $this->publishes([
                __DIR__ . '/../Publish/InersiaRequest/kernel'
                => base_path('app/Http/'),
            ]);

            // Publish the inersia request stuff
            $this->publishes([
                __DIR__ . '/../Publish/InersiaRequest/handleRequest'
                => app_path('Http/Middleware'),
            ]);

            // Publish now view for the inersia were we goin to render the page
            $this->publishes([
                __DIR__ . '/../Publish/InersiaRequest/appLayout'
                => resource_path('views/'),
            ]);
        } else {
            $prefix_blade = 'blade';
        }

        // Publish the npm
        $this->publishes([
            __DIR__ . '/../Publish/Npm/' . $prefix_blade => base_path(),
        ]);

        // Publish the resource
        $this->publishes([
            __DIR__ . '/../Publish/Resource/' . $prefix_blade => resource_path('vendor/Skeleton/'),
        ]);

        // Publish the public folder with the css and javascript pre compile
        $this->publishes([
            __DIR__ . '/../Publish/Public/' . $prefix_blade => public_path('vendor/Skeleton/'),
        ]);
    }
}
