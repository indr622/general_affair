<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Biodata implements FromView
{

    protected $region;
    protected $vendor;
    protected $type;


    public function __construct($type, $region, $vendor)
    {
        $this->region = $region;
        $this->vendor = $vendor;
        $this->type = $type;
    }


    public function view(): View
    {
        $employee = Employee::with('branch', 'vendor')
            ->where('jabatan', 'ob')
            ->where('vendor_id', $this->vendor->id)
            ->get();
        return view('template.biodata', [
            'region' => $this->region,
            'vendor' => $this->vendor,
            'type' => $this->type,
            'employee' => $employee
        ]);
    }
}
