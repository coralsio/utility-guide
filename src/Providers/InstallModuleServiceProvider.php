<?php

namespace Corals\Utility\Guide\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\Utility\Guide\database\migrations\CreateGuidesTable;
use Corals\Utility\Guide\database\seeds\UtilityGuideDatabaseSeeder;

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
