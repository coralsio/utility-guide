<?php

namespace Corals\Modules\Utility\Guide;

use Corals\Foundation\Providers\BasePackageServiceProvider;
use Corals\Modules\Utility\Guide\Providers\UtilityAuthServiceProvider;
use Corals\Modules\Utility\Guide\Providers\UtilityRouteServiceProvider;
use Corals\Settings\Facades\Modules;
use Corals\Utility\Facades\UtilityGuide;
use Illuminate\Foundation\AliasLoader;

class UtilityGuideServiceProvider extends BasePackageServiceProvider
{
    /**
     * @var
     */
    protected $packageCode = 'corals-utility-guide';

    public function bootPackage()
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
        \Filters::add_filter('corals_middleware', [\Corals\Utility\Guide\Classes\UtilityGuide::class, 'guideMiddleware'], 8);
    }

    public function registerPackage()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);
        $this->app->booted(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('UtilityGuide', UtilityGuide::class);
        });
    }

    public function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-guide');
    }
}
