<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $au = Permissions::create([
            'name' => 'Administer Users'
        ]);
        $ar = Permissions::create([
            'name' => 'Administer Roles'
        ]);
        $ap = Permissions::create([
            'name' => 'Administer Permissions'
        ]);
        $aR = Permissions::create([
            'name' => 'Administer Requests'
        ]);

        $a = Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'PD'
        ]);
        Role::create([
            'name' => 'EMS'
        ]);
        Role::create([
            'name' => 'DOJ'
        ]);

        $cockers = User::create([
            'name' => 'Cockers',
            'username' => 'cockers_admin',
            'email' => 'jamescockfield10@gmail.com',
            'password' => '$2y$10$Z12yQr.fPzlcR9JRea7EY.w/gFvKIQ0uB3TLGXNmyzoPmCq6lvKHi'
        ]);
        // assign permissions to role
        $au->assignRole($a);
        $ar->assignRole($a);
        $ap->assignRole($a);
        $aR->assignRole($a);
        // assign role to user
        $cockers->assignRole($a);
    }
}
