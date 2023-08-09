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
        Branch::create(['name' => 'Cileungsi-Mall Cileungsi', 'code' => '0101', 'description' => 'Cabang', 'region_id' => 2]);
        Branch::create(['name' => 'Kantor Remote Office-Alam Sutera', 'code' => '0102', 'description' => 'Sentra Operation', 'region_id' => 2]);
        Branch::create(['name' => 'HO - Kantor Pusat (MCC)', 'code' => '0103', 'description' => 'Kantor Pusat', 'region_id' => 2]);
        Branch::create(['name' => 'Kantor Sentra Credit-Tebet', 'code' => '0104', 'description' => 'Sentra Credit', 'region_id' => 2]);
        Branch::create(['name' => 'Rangkasbitung-Malingping', 'code' => '0105', 'description' => 'satelite', 'region_id' => 2]);

        //JABAR
        Branch::create(['name' => 'Kantor Sentra Operation-Soekarno Hatta', 'code' => '0202', 'description' => 'Sentra Operation', 'region_id' => 3]);
        Branch::create(['name' => 'Bandung - Soekarno Hatta', 'code' => '0201', 'description' => 'Cabang', 'region_id' => 3]);
        Branch::create(['name' => 'Kantor Sentra SND Jabar', 'code' => '0204', 'description' => 'Sentra SND', 'region_id' => 3]);
        Branch::create(['name' => 'Bandung 5 -  Majalaya', 'code' => '0205', 'description' => 'Satelite', 'region_id' => 3]);
        Branch::create(['name' => 'Warehouse Tasikmalaya', 'code' => '0203', 'description' => 'Warehouse', 'region_id' => 3]);

        //JATIM
        Branch::create(['name' => 'Kantor Sentra SND Jatim', 'code' => '0301', 'description' => 'Sentra SND', 'region_id' => 4]);
        Branch::create(['name' => 'Kantor Sentra Operation - Waru', 'code' => '0302', 'description' => 'Sentra Operation', 'region_id' => 4]);
        Branch::create(['name' => 'Kantor Sentra HCGA - Surabaya', 'code' => '0303', 'description' => 'Sentra HCGA', 'region_id' => 4]);
        Branch::create(['name' => 'Banyuwangi - S. Parman', 'code' => '0304', 'description' => 'Cabang', 'region_id' => 4]);
        Branch::create(['name' => ' Banyuwangi - Genteng ', 'code' => '0305', 'description' => 'Satellite', 'region_id' => 4]);

        //JATENG
        Branch::create(['name' => 'Kantor Sentra SND Jateng', 'code' => '0401', 'description' => 'Region SSD', 'region_id' => 5]);
        Branch::create(['name' => 'Klaten - Pemuda Utara', 'code' => '0402', 'description' => 'Cabang', 'region_id' => 5]);
        Branch::create(['name' => 'Kantor Sentra HCGA - Surabaya', 'code' => '0403', 'description' => 'Satellite', 'region_id' => 5]);
        Branch::create(['name' => 'Kantor Sentra Credit-Solo Baru', 'code' => '0404', 'description' => 'Sentra Credit', 'region_id' => 5]);
        Branch::create(['name' => 'Kantor Sentra Operation-Solo Baru', 'code' => '0405', 'description' => 'Sentra Operatio', 'region_id' => 5]);

        //BNT
        Branch::create(['name' => 'Kantor Sentra SND BNT', 'code' => '0504', 'description' => 'Sentra SND', 'region_id' => 6]);
        Branch::create(['name' => 'Kantor Sentra Credit - Dewata Square', 'code' => '0502', 'description' => 'Sentra Credit', 'region_id' => 6]);
        Branch::create(['name' => 'Kantor Sentra Operation - Denpasar', 'code' => '0503', 'description' => 'Sentra Operation', 'region_id' => 6]);
        Branch::create(['name' => 'Denpasar - Dewata Square', 'code' => '0501', 'description' => 'Cabang', 'region_id' => 6]);
        Branch::create(['name' => 'Denpasar - Nusa Dua', 'code' => '0505', 'description' => 'Satellite', 'region_id' => 6]);

        //SUMABGUT
        Branch::create(['name' => 'Banda Aceh-Teuku Umar', 'code' => '0601', 'description' => 'Cabang', 'region_id' => 7]);
        Branch::create(['name' => 'Bangkinang - Flamboyan', 'code' => '0602', 'description' => 'Satellite', 'region_id' => 7]);
        Branch::create(['name' => 'Kantor Remote Office-Kisaran', 'code' => '0603', 'description' => 'Remote Office', 'region_id' => 7]);
        Branch::create(['name' => 'Kantor Sentra Operation-Graha Niaga', 'code' => '0604', 'description' => 'Sentra Operation', 'region_id' => 7]);
        Branch::create(['name' => 'Warehouse Pekanbaru', 'code' => '0605', 'description' => 'Warehouse', 'region_id' => 7]);

        //SULAWESI
        Branch::create(['name' => 'Ambon - Setia Budi', 'code' => '0701', 'description' => 'Cabang', 'region_id' => 8]);
        Branch::create(['name' => 'Bulukumba - Bantaeng', 'code' => '0702', 'description' => 'Satellite', 'region_id' => 8]);
        Branch::create(['name' => 'Bulukumba - Sinjai', 'code' => '0703', 'description' => 'Satellite Terbatas', 'region_id' => 8]);
        Branch::create(['name' => 'Kantor Sentra SND Sulampapua', 'code' => '0704', 'description' => 'Sentra SND', 'region_id' => 8]);
        Branch::create(['name' => 'Kantor Sentra Credit - Gowa', 'code' => '0705', 'description' => 'Sentra Credit', 'region_id' => 8]);

        //KALIMANTAN
        Branch::create(['name' => 'Balikpapan - Jend. Sudirman', 'code' => '0801', 'description' => 'Cabang', 'region_id' => 9]);
        Branch::create(['name' => 'Banjarmasin - Kapuas', 'code' => '0802', 'description' => 'Satellite', 'region_id' => 9]);
        Branch::create(['name' => 'Kantor Sentra HCGA - Banjarmasin', 'code' => '0803', 'description' => 'Sentra HCGA', 'region_id' => 9]);
        Branch::create(['name' => 'Warehouse Batu Licin', 'code' => '0804', 'description' => 'Warehouse', 'region_id' => 9]);
        Branch::create(['name' => 'Kantor Remote Office - Pontianak', 'code' => '0805', 'description' => 'Remote Office', 'region_id' => 9]);

        //SUMBAGSEL
        Branch::create(['name' => 'Bandar Jaya - Proklamator', 'code' => '1101', 'description' => 'Cabang', 'region_id' => 10]);
        Branch::create(['name' => 'Baturaja - Lahat', 'code' => '1102', 'description' => 'Satellite', 'region_id' => 10]);
        Branch::create(['name' => 'Kantor Remote Office-Bengkulu', 'code' => '1103', 'description' => 'Remote Office', 'region_id' => 10]);
        Branch::create(['name' => 'Kantor Sentra Operation-Sukamto', 'code' => '1104', 'description' => 'Sentra Operation', 'region_id' => 10]);
        Branch::create(['name' => 'Warehouse Lampung', 'code' => '1105', 'description' => 'Warehouse', 'region_id' => 10]);
    }
}
