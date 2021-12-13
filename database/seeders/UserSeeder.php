<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cockers',
            'username' => 'cockers_admin',
            'email' => 'jamescockfield10@gmail.com',
            'password' => '$2y$10$Z12yQr.fPzlcR9JRea7EY.w/gFvKIQ0uB3TLGXNmyzoPmCq6lvKHi'
        ]);
    }
}
