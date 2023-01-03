<?php

namespace Corals\Modules\Utility\Guide;

use Corals\Modules\Utility\Guide\Providers\UtilityAuthServiceProvider;
use Corals\Modules\Utility\Guide\Providers\UtilityRouteServiceProvider;
use Corals\Settings\Facades\Modules;
use Illuminate\Support\ServiceProvider;

class UtilityGuideServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-guide');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-guide');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility-guide.php',
            'utility-guide'
        );
        $this->publishes([
            __DIR__ . '/config/utility-guide.php' => config_path('utility-guide.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-guide'),
        ]);

        $this->registerModulesPackages();
    }

    public function register()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);
    }

    protected function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-guide');
    }
}
