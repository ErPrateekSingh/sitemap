<?php

namespace Watson\Sitemap;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Registrar::class);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'sitemap');

        $this->loadRoutesFrom(__DIR__ . '/../../routes.php');

        if ($this->app->runningInConsole()) {
            $this->commands(
                Commands\InstallCommand::class,
                Commands\GenerateCommand::class,
                Commands\SubmitCommand::class
            );
        }
    }
}
