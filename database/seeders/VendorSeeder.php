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
        Vendor::create(['name' => 'RESIK',  'description' => 'PT. RESIK CEMERLANG']);
        Vendor::create(['name' => 'NSA',  'description' => 'PT. NUSANTARA SATRIA AGUNG']);
        Vendor::create(['name' => 'TAG',  'description' => 'PT. TUNAS ARTHA GARDATAMA SEKURITI']);
    }
}
