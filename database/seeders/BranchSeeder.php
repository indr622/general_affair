<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //JABODETABEK
        Branch::create(['name' => 'Cileungsi-Mall Cileungsi', 'code' => '0110', 'description' => 'Cabang', 'region_id' => 2]);
        Branch::create(['name' => 'Kantor Remote Office-Alam Sutera', 'code' => '9H02', 'description' => 'Sentra Operation', 'region_id' => 2]);
        Branch::create(['name' => 'HO - Kantor Pusat (MCC)', 'code' => '9E03', 'description' => 'Kantor Pusat', 'region_id' => 2]);
        Branch::create(['name' => 'Kantor Sentra Credit-Tebet', 'code' => '9B02', 'description' => 'Sentra Credit', 'region_id' => 2]);
        Branch::create(['name' => 'Rangkasbitung-Malingping', 'code' => '0135', 'description' => 'satelite', 'region_id' => 2]);

        //JABAR
        Branch::create(['name' => 'Kantor Sentra Operation-Soekarno Hatta', 'code' => '9H01', 'description' => 'Sentra Operation', 'region_id' => 3]);
        Branch::create(['name' => 'Bandung - Soekarno Hatta', 'code' => '0201', 'description' => 'Cabang', 'region_id' => 3]);
        Branch::create(['name' => 'Kantor Sentra SND Jabar', 'code' => '0200', 'description' => 'Sentra SND', 'region_id' => 3]);
        Branch::create(['name' => 'Bandung 5 -  Majalaya', 'code' => '0226', 'description' => 'Satelite', 'region_id' => 3]);
        Branch::create(['name' => 'Warehouse Tasikmalaya', 'code' => '9B26', 'description' => 'Warehouse', 'region_id' => 3]);
    }
}
