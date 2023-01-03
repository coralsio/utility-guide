<?php

namespace Corals\Modules\Utility\Guide\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\Modules\Utility\Guide\database\migrations\CreateGuidesTable;
use Corals\Modules\Utility\Guide\database\seeds\UtilityGuideDatabaseSeeder;

class InstallModuleServiceProvider extends BaseInstallModuleServiceProvider
{
    protected $migrations = [
        CreateGuidesTable::class,
    ];

    protected function providerBooted()
    {
        $this->createSchema();

        $utilityGuideDatabaseSeeder = new UtilityGuideDatabaseSeeder();

        $utilityGuideDatabaseSeeder->run();
    }
}
