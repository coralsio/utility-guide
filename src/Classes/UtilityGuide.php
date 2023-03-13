<?php

namespace Corals\Modules\Utility\Guide\Classes;

use Corals\Modules\Utility\Guide\Middleware\AddGuideAssetsMiddleware;

class UtilityGuide
{
    /**
     * @param array $urlGuideConfig
     * @param $url
     */
    public function includeGuidesAssets(array $urlGuideConfig, $url)
    {
        \JavaScript::put([
            'urlGuideConfig' => $urlGuideConfig,
            'guideableUrl' => $url,
        ]);

        \Assets::add(asset('assets/corals/plugins/introJs/js/intro.min.js'));
        \Assets::add(asset('assets/corals/plugins/introJs/js/intro_functions.js'));

        \Assets::add(asset('assets/corals/plugins/introJs/css/introjs.css'));
    }

    /**
     * @param $middleware
     * @param $request
     * @return array
     */
    public function guideMiddleware($middleware, $request)
    {
        $middleware[] = AddGuideAssetsMiddleware::class;

        return $middleware;
    }
}
