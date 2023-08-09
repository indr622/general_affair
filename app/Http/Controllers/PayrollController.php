<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Region;
use App\Models\Vendor;
use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\PayrollImport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Payroll as ExportsPayroll;
use App\Http\Requests\StorePayrollRequest;
use App\Http\Requests\UpdatePayrollRequest;

class PayrollController extends Controller
{
    public function office_boy()
    {
        $vendor = Vendor::all();
        $region = Region::all();

        $currentYear = Carbon::now()->year;
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create($currentYear, $month, 1);
            $bulan[] = $date->format('F') . ' ' . $date->format('Y');
        }
        return view('payroll.ob.index', compact('vendor', 'region', 'bulan'));
    }

    public function security()
    {
        return view('payroll.security.index');
    }

    public function upload(Request $request)
    {
        $data = Excel::toArray(new PayrollImport, $request->file('file_payroll'));
        $sheetData = $data[0];

        $payroll = [];
        foreach ($sheetData as $row) {
            $value = collect($row)->filter(function ($item) {
                return $item;
            })->toArray();

            array_push($payroll, $value);
        }

        dd($payroll);




        DB::beginTransaction();
        try {
            foreach ($slicedArray as $key => $value) {

                $branch = Branch::where('code', $value[2])->first();
                Employee::updateOrCreate(
                    [
                        'nik' => $value[8]
                    ],
                    [
                        'branch_id' =>  $branch->id,
                        'vendor_id' =>  $vendor->id,
                        'nik' => $value[8],
                        'name' => Str::upper($value[6]),
                        'jabatan' => Str::lower($value[7]),
                        'jenis_kelamin' => Str::upper($value[10]),
                        'tgl_masuk' => gettype($value[4]) == 'integer' ? Carbon::createFromDate(1900, 1, 1)->addDays($value[4] - 2)->format('Y-m-d') : $value[4],
                        'tgl_keluar' =>  $value[5] == '-'  ? null : (gettype($value[5])  == 'integer' ? Carbon::createFromDate(1900, 1, 1)->addDays($value[5] - 2)->format('Y-m-d') : $value[5]),
                        'tgl_lahir' =>  gettype($value[9]) == 'integer' ? Carbon::createFromDate(1900, 1, 1)->addDays($value[9] - 2)->format('Y-m-d') : $value[4],

                    ]
                );
            }
            DB::commit();
            return redirect()
                ->back()->withSuccess('Data berhasil diupload');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()->withError('Data gagal diupload perikasa kembali data anda' . $e->getMessage());
        }
    }

    public function download(Request $request)
    {
        $vendor = Vendor::findOrFail($request->vendor_id);
        $region = Region::findOrFail($request->region_id);
        $periode = $request->periode;
        $type = $request->type;
        $name_file = $type == '1' ? 'OB' : 'Security';

        if (!$vendor || !$region) {
            return redirect()->back()->withError('Data tidak ditemukan');
        }
        return Excel::download(new ExportsPayroll($type, $region, $vendor, $periode),  $vendor->name . ' -  ' . $name_file . ' ' . Str::ucfirst($region->name)  . " " . $periode . ' payroll.xlsx');
    }
}
