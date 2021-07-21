<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        Product::factory(20)->create();

    }
}
