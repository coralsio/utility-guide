<?php

namespace Corals\Modules\Utility\Guide\database\seeds;

use Corals\User\Models\Permission;
use Illuminate\Database\Seeder;

class UtilityGuideDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UtilityGuidePermissionsDatabaseSeeder::class);
        $this->call(UtilityGuideMenuDatabaseSeeder::class);
    }

    public function rollback()
    {
        Permission::where('name', 'like', 'UtilityGuide::guide%')->delete();
    }
}
