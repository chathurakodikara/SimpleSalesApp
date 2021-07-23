<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Product;
use App\Models\Material;
use App\Models\Territory;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\MasterDataSeeder;

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
        Zone::truncate();
        Region::truncate();
        Territory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->call([
            MasterDataSeeder::class, // Zone, Region, Territory in the seeder
            UserSeeder::class,
        ]);


        Product::factory(10)->create();

    }
}
