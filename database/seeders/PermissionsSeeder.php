<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Administer Users'
        ]);
        Permission::create([
            'name' => 'Administer Roles'
        ]);
        Permission::create([
            'name' => 'Administer Permissions'
        ]);
        Permission::create([
            'name' => 'Administer Requests'
        ]);
    }
}
