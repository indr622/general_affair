<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create(['name' => 'RESIK',  'description' => 'Vendor Resik']);
        Vendor::create(['name' => 'NSA',  'description' => 'Vendor NSA']);
        Vendor::create(['name' => 'TAG',  'description' => 'Vendor TAG']);
    }
}
