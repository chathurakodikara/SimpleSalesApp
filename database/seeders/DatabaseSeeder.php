<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
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
        User::truncate();
        Product::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->call([
            UserSeeder::class,
        ]);


        Product::factory(10)->create();

    }
}
