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
     */
    public function run(): void
    {
        User::create([
            'name' => 'RATNA',
            'username' => '10012185',
            'password' => Hash::make('122222'),
            'email' => 'ratnard2208@gmail.com',
            'region_id' => 1,
        ])->assignRole('ADMIN-HCM');
        User::create([
            'name' => 'SONI',
            'username' => '10012810',
            'password' => Hash::make('222222'),
            'email' => 'sonii12@gmail.com',
            'region_id' => 2,
        ])->assignRole('ADMIN-HCM');
        User::create([
            'name' => 'AGHA',
            'username' => '10011002',
            'password' => Hash::make('322222'),
            'email' => 'agha88@gmail.com',
            'region_id' => 3,
        ])->assignRole('ADMIN-HCM');
    }
}
