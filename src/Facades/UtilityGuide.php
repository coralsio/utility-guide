<?php

namespace Corals\Modules\Utility\Guide\Facades;

use Illuminate\Support\Facades\Facade;

class UtilityGuide extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return \Corals\Modules\Utility\Guide\Classes\UtilityGuide::class;
    }
}
