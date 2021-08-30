<?php

namespace Mariojgt\Unityuser;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Mariojgt\Unityuser\Commands\Install;
use Mariojgt\Unityuser\Commands\Republish;
use Mariojgt\Unityuser\Events\UserVerifyEvent;
use Mariojgt\Unityuser\Listeners\SendUserVerifyListener;

class UnityuserProvider extends ServiceProvider
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
            \Mariojgt\Unityuser\Middleware\BootTokenApi::class
        );

        // Load unity-user views
        $this->loadViewsFrom(__DIR__ . '/views', 'unity-user');

        // Load unity-user routes
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
        // Publish the npm
        $this->publishes([
            __DIR__ . '/../Publish/Npm/' => base_path(),
        ]);

        // Publish the resource
        $this->publishes([
            __DIR__ . '/../Publish/Resource/' => resource_path('vendor/Unityuser/'),
        ]);

        // Publish the public folder with the css and javascript pre compile
        $this->publishes([
            __DIR__ . '/../Publish/Public/' => public_path('vendor/Unityuser/'),
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Config/' => config_path(''),
        ]);

        // Publish the scale folder for custome changes if need
        $this->publishes([
            __DIR__ . '/../Publish/components/' => resource_path('views/components'),
        ]);

        // Publish the helper that will customer the login if need
        $this->publishes([
            __DIR__ . '/../Publish/Helpers/' => app_path('Helpers'),
        ]);
    }
}
