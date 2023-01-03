<?php

namespace Corals\Modules\Utility\Guide\Providers;

use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\Modules\Utility\Guide\database\migrations\CreateGuidesTable;
use Corals\Modules\Utility\Guide\database\seeds\UtilityGuideDatabaseSeeder;

class UninstallModuleServiceProvider extends BaseUninstallModuleServiceProvider
{
    protected $migrations = [
        CreateGuidesTable::class,
    ];

    protected function providerBooted()
    {
        $this->dropSchema();

        $utilityGuideDatabaseSeeder = new UtilityGuideDatabaseSeeder();

        $utilityGuideDatabaseSeeder->rollback();
    }
}
