<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Vendor;
use App\Exports\Biodata;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BiodataController extends Controller
{
    public function office_boy()
    {

        $vendor = Vendor::all();
        $region = Region::all();
        $employee = Employee::with('branch', 'vendor')
            ->where('jabatan', 'ob')->get();

        return view('biodata.ob.index', compact('employee', 'vendor', 'region'));
    }

    public function security()
    {
        $employee = Employee::with('branch', 'vendor')
            ->where('jabatan', 'security')->get();

        return view('biodata.security.index', compact('employee'));
    }

    public function download(Request $request)
    {
        $vendor = Vendor::findOrFail($request->vendor_id);
        $region = Region::findOrFail($request->region_id);

        if (!$vendor || !$region) {
            return redirect()->back()->withError('Data tidak ditemukan');
        }
        return Excel::download(new Biodata(1, $region, $vendor), $vendor->name . ' - OB ' . Str::ucfirst($region->name)  . " " . date('Y') . '.xlsx');
    }

    public function upload(Request $request)
    {
        $data = Excel::toArray(new EmployeeImport, $request->file('file_employee'));
        $sheetData = $data[0];

        $employe = [];
        foreach ($sheetData as $row) {
            $value = collect($row)->filter(function ($item) {
                return $item;
            })->toArray();

            array_push($employe, $value);
        }

        $slicedArray = array_slice($employe, 6);
        DB::beginTransaction();
        try {
            foreach ($slicedArray as $key => $value) {
                Employee::updateOrCreate(
                    [
                        'nik' => $value[8]
                    ],
                    [
                        'branch_id' => 1,
                        'vendor_id' => 1,
                        'nik' => $value[8],
                        'name' => $value[6],
                        'jabatan' => Str::lower($value[7]),
                        'jenis_kelamin' => $value[10],
                        'tgl_masuk' => $value[4],
                        'tgl_keluar' => $value[5] == '-' ? null : $value[5],
                        'tgl_lahir' => $value[9],
                    ]
                );
            }
            DB::commit();
            return redirect()
                ->back()->withSuccess('Data berhasil diupload');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()
                ->back()->withError('Data gagal diupload perikasa kembali data anda');
        }
    }
}
