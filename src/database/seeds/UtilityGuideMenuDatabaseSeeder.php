<?php

namespace Corals\Modules\Utility\Guide\database\seeds;

use Illuminate\Database\Seeder;

class UtilityGuideMenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utilities_menu_id = \DB::table('menus')->where('key', 'utility')->pluck('id')->first();


        \DB::table('menus')->insert(
            [
                [
                    'parent_id' => $utilities_menu_id,
                    'key' => null,
                    'url' => 'utilities/guides',
                    'active_menu_url' => 'utilities/guides' . '*',
                    'name' => 'Guides',
                    'description' => 'List Of Guides',
                    'icon' => 'fa fa-list',
                    'target' => null,
                    'roles' => '["1"]',
                    'order' => 0
                ],
            ]
        );
    }
}
