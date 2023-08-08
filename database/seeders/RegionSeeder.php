<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::create(['name' => 'KANTOR PUSAT', 'code' => "9999"]);
        Region::create(['name' => 'JABODETABEK', 'code' => "0100"]);
        Region::create(['name' => 'JABAR', 'code' => "0200"]);
        Region::create(['name' => 'JATIM', 'code' => "0300"]);
        Region::create(['name' => 'JATENG', 'code' => "0400"]);
        Region::create(['name' => 'BNT', 'code' => "0500"]);
        Region::create(['name' => 'SUMBAGUT', 'code' => "0600"]);
        Region::create(['name' => 'SULAWESI', 'code' => "0700"]);
        Region::create(['name' => 'KALIMANTAN', 'code' => "0800"]);
        Region::create(['name' => 'SUMBAGSEL', 'code' => "1100"]);
    }
}
