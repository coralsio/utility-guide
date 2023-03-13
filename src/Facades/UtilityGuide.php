<?php

namespace Corals\Utility\Facades;

use Illuminate\Support\Facades\Facade;

class UtilityGuide extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return \Corals\Utility\Guide\Classes\UtilityGuide::class;
    }
}
