<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Payroll implements FromView
{
    protected $region;
    protected $vendor;
    protected $type;
    protected $periode;


    public function __construct($type, $region, $vendor,    $periode)
    {
        $this->region = $region;
        $this->vendor = $vendor;
        $this->type = $type;
        $this->periode = $periode;
    }

    public function view(): View
    {
        return view('template.payroll', [
            'region' => $this->region,
            'vendor' => $this->vendor,
            'type' => $this->type,
            'periode' => $this->periode
        ]);
    }
}
