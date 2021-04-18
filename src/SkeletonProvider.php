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

        // Loading the middlewhere
        $this->app['router']->aliasMiddleware(
            'boot_token',
            \Mariojgt\Skeleton\Middleware\BootTokenApi::class
        );

        // Load skeleton views
        $this->loadViewsFrom(__DIR__.'/views', 'skeleton');
        // Load skeleton routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/auth.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
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
        // Publish the npm case we need to do soem developent
        $this->publishes([
            __DIR__.'/../Publish/Npm/' => base_path()
        ]);

        // Publish the resource in case we need to compile
        $this->publishes([
            __DIR__.'/../Publish/Resource/' => resource_path('vendor/Skeleton/')
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__.'/../Publish/Public/' => public_path('vendor/Skeleton/')
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__.'/../Publish/Config/' => config_path('')
        ]);
    }
}
