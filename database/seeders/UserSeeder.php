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
        $adminHcm = User::create([
            'name' => 'RATNA',
            'username' => 'ratna',
            'password' => Hash::make('ratna'),
            'email' => 'admin@admin.com',
            'region_id' => 1,
        ]);
        $adminHcm->assignRole('ADMIN-HCM');
    }
}
