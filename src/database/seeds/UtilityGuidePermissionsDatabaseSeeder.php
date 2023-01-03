<?php

namespace Corals\Modules\Utility\Guide\database\seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UtilityGuidePermissionsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert([
            //Guide
            [
                'name' => 'Utility::guide.view',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::guide.create',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::guide.update',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Utility::guide.delete',
                'guard_name' => config('auth.defaults.guard'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
