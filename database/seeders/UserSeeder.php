<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::Create([
            'name' => 'Chathura Kodikara',
            'is_admin' => 1 ,
            'gender' => 'male',
            'nic' => '000000000V',
            'mobile' => '0710000000',
            'address' => 'XXX',
            'email' => '',
            'email_verified_at' => now(),

            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
