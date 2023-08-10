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

        $payroll = Payroll::with(['employee' => function ($q) {
            return $q->where('jabatan', 'ob');
        }])
            ->join('employees', 'employees.id', '=', 'payrolls.employee_id')
            ->where('employees.jabatan', 'ob')
            ->get();

        return view('payroll.ob.index', compact('vendor', 'region', 'bulan', 'payroll'));
    }

    public function security()
    {
        $vendor = Vendor::all();
        $region = Region::all();

        $currentYear = Carbon::now()->year;
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create($currentYear, $month, 1);
            $bulan[] = $date->format('F') . ' ' . $date->format('Y');
        }

        $payroll = Payroll::with(['employee' => function ($q) {
            return $q->where('jabatan', 'security');
        }])
            ->join('employees', 'employees.id', '=', 'payrolls.employee_id')
            ->where('employees.jabatan', 'security')
            ->get();

        return view('payroll.security.index', compact('vendor', 'region', 'bulan', 'payroll'));
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
        $slicedArray = array_slice($payroll, 7);
        DB::beginTransaction();
        try {
            foreach ($slicedArray as $key => $value) {
                $employee = Employee::where('nik', $value[13])->first();
                Payroll::updateOrCreate(
                    [
                        'employee_id' => $employee->id,
                        'periode' => $value[18]
                    ],
                    [
                        'employee_id' => $employee->id,
                        'gapok' =>  $value[6],
                        'bpjs_ketegakerjaan' =>  $value[7],
                        'bpjs_kesehatan' => $value[8],
                        'bpjs_pensiun' => $value[9],
                        'total' => $value[10],
                        'periode' => $value[18],
                    ]
                );
            }
            DB::commit();
            return redirect()
                ->back()->withSuccess('Data berhasil diupload');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()->withError('Data gagal diupload perikasa kembali data anda ' . $e->getMessage());
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
