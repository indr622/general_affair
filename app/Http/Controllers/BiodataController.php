<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Vendor;
use App\Exports\Biodata;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Imports\EmployeeImport;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BiodataController extends Controller
{
    public function office_boy()
    {

        $vendor = Vendor::all();
        $region = Region::all();
        $employee = Employee::with('branch', 'vendor', 'branch.region')
            ->where('jabatan', 'ob')->get();

        return view('biodata.ob.index', compact('employee', 'vendor', 'region'));
    }

    public function security()
    {
        $vendor = Vendor::all();
        $region = Region::all();
        $employee = Employee::with('branch', 'vendor', 'branch.region')
            ->where('jabatan', 'security')->get();

        return view('biodata.security.index', compact('employee', 'vendor', 'region'));
    }

    public function download(Request $request)
    {
        $vendor = Vendor::findOrFail($request->vendor_id);
        $region = Region::findOrFail($request->region_id);
        $type = $request->type;
        $name_file = $type == '1' ? 'OB' : 'Security';

        if (!$vendor || !$region) {
            return redirect()->back()->withError('Data tidak ditemukan');
        }
        return Excel::download(new Biodata($type, $region, $vendor), $vendor->name . ' -  ' . $name_file . ' ' . Str::ucfirst($region->name)  . " " . date('Y') . '.xlsx');
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

        $vendor = Vendor::where('description', 'like', '%' . $employe[1][0] . '%')->first();
        $slicedArray = array_slice($employe, 6);

        DB::beginTransaction();
        try {
            foreach ($slicedArray as $key => $value) {

                $branch = Branch::where('code', $value[2])->first();

                Employee::updateOrCreate(
                    [
                        'nik' => $value[8]
                    ],
                    [
                        'branch_id' => $branch ? $branch->id : 1,
                        'vendor_id' =>  $vendor->id,
                        'nik' => $value[8],
                        'name' => Str::upper($value[6]),
                        'jabatan' => Str::lower($value[7]),
                        'jenis_kelamin' => Str::upper($value[10]),
                        'tgl_masuk' =>   Carbon::createFromDate(1900, 1, 1)->addDays($value[4] - 2)->format('Y-m-d') ?? ($value[4] ?? null),
                        'tgl_keluar' => $value[5] == '-'  ? null : Carbon::createFromDate(1900, 1, 1)->addDays($value[5] - 2)->format('Y-m-d') ?? ($value[5] ?? null),
                        'tgl_lahir' =>  Carbon::createFromDate(1900, 1, 1)->addDays($value[9] - 2)->format('Y-m-d') ?? ($value[9] ?? null),
                    ]
                );
            }
            DB::commit();
            return redirect()
                ->back()->withSuccess('Data berhasil diupload');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()
                ->back()->withError('Data gagal diupload perikasa kembali data anda');
        }
    }
}
