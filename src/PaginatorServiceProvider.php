<?php

namespace OmidMorovati\Paginator;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class PaginatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMacros();
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'paginator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'paginator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('paginator.php'),
            ], 'config');

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/omidmorovati/paginator'),
            ], 'assets');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/omidmorovati/paginator'),
            ], 'views');


            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/paginator'),
            ], 'lang');*/

            // Registering package commands.
             $this->commands([\OmidMorovati\Paginator\Commands\Installation::class]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'paginator');

        // Register the main class to use with the facade
        $this->app->bind('paginator', function ($base_url = '/page/') {
            return new Paginator($base_url);
        });
    }

    public function loadMacros()
    {
        $pageNumber = $this->getPageNumber() ?? 1;
        Builder::macro('makePaginate', function ($perPage = 1, $currentPage = null) use ($pageNumber) {
            $currentPage = $currentPage ?? $pageNumber;
            $modelCount = $this->get()->count();
            Collection::macro('renderPaginate', function ($base_url = '/page/') use ($currentPage, $modelCount, $perPage) {
                if ($currentPage) {
                    return (new Paginator($base_url))->paginate($modelCount ?? $this->count(), $perPage, (int)$currentPage);
                }
                return null;
            });
            if ($currentPage) {
                return $this->forPage($currentPage, $perPage);
            }
        });
    }

    public function getPageNumber()
    {
        $pageNumber=null;
        preg_match_all('/\d+$/', Request::getRequestUri(), $matches);
        if (!empty($matches[0])) {
            while (is_array($matches)) {
                foreach ($matches as $match) {
                    $pageNumber = $match;
                }
                $matches = $pageNumber;
            }
        }
        return $pageNumber;
    }
}
