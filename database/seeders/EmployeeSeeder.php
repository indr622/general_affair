<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //JABODETABEK
        Employee::create([
            'branch_id' => 1,
            'vendor_id' => 1,
            'nik' => '0213674010111',
            'name' => 'ALI',
            'jabatan' => 'ob',
            'jenis_kelamin' => 'L',
            'tgl_masuk' => '2011-01-01',
            'tgl_keluar' => null,
            'tgl_lahir' => '1991-11-10',

        ]);
    }
}
