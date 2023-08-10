<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {

        return view('report.index');
    }


    public function store(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        return view('report.print', compact('bulan', 'tahun'));
    }
}
