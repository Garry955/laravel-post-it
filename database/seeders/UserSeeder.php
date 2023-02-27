<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for($i=0; $i < 50; $i++) {
            User::create([
                'name' => 'Test-'.$i+1,
                'username' => 'Test'.$i+1,
                'email' => 'test'.($i+1).'@test.com',
                'city' => 'Pécs',
                'gender'=> random_int(0,1),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
