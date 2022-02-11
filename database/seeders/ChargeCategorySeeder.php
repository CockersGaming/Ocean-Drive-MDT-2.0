<?php

namespace Database\Seeders;

use App\Models\ChargeCategory;
use Illuminate\Database\Seeder;

class ChargeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'Infractions'],
            ['name'=>'Misdemeanors'],
            ['name'=>'Felonies'],
        ];

        ChargeCategory::insert($categories);
    }
}
