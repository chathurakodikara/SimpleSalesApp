<?php

namespace Database\Seeders;

use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            ['Zone 1', 'Z01'],
            ['Zone 2', 'Z02'],
            ['Zone 3', 'Z03'],
            ['Zone 4', 'Z04']
        ];

        foreach ($zones as $item) {
     
            Zone::create([
                'long_description' => $item[0],
                'short_description' => $item[1],
            ]);
        }

        $regions = [
            ['REGION01', '1'],
            ['REGION02', '2'],
            ['REGION03', '3'],
            ['REGION04', '4'],
            ['REGION05', '1'],
            ['REGION06', '2'],
            ['REGION07', '3'],
            ['REGION08', '4']
        ];

        foreach ($regions as $item) {
     
            Region::create([
                'name' => $item[0],
                'zone_id' => $item[1],
            ]);
        }

        $territories = [
            ['TERRITORY01', '1'],
            ['TERRITORY02', '2'],
            ['TERRITORY03', '3'],
            ['TERRITORY04', '4'],
            ['TERRITORY05', '1'],
            ['TERRITORY06', '2'],
            ['TERRITORY07', '3'],
            ['TERRITORY08', '4']
        ];


        foreach ($territories as $item) {
     
            Territory::create([
                'name' => $item[0],
                'region_id' => $item[1],
            ]);
        }
    }
}
