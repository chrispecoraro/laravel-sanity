<?php 

namespace Eastslopestudio\LaravelSanity;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Directory path to this package
     */
    protected $packagePath = __DIR__ . '/../';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Merge own configs into package configs
        $this->mergeConfigFrom("{$this->packagePath}config/sanity.php", 'sanity');

        // Register the container singleton
        $this->app->singleton(Sanity::class, function ($app) {
            return new Sanity($app['config']['sanity']);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Sanity::class];
    }

}