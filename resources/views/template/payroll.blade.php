@php
    $date = Carbon\Carbon::createFromFormat('F Y', $periode);
    $month = $date->month;
    $year = $date->year;
    $formattedDate = sprintf('%02d%02d', $month, $year % 100); // Output: "0123"
    
    $payroll = \App\Models\Payroll::with('employee')
        ->where('periode', $formattedDate)
        ->join('employees', 'employees.id', '=', 'payrolls.employee_id')
        ->join('branches', 'branches.id', '=', 'employees.branch_id')
        ->join('regions', 'regions.id', '=', 'branches.region_id')
        ->join('vendors', 'vendors.id', '=', 'employees.vendor_id')
        ->where('employees.jabatan', $type == 1 ? 'ob' : 'security')
        ->where('regions.id', $region->id)
        ->where('vendors.id', $vendor->id)
        ->get();
@endphp

<table border="1">
    <thead>
        <tr></tr>
        <tr>
            <th><b>{{ $vendor->description }}</b></th>
        </tr>
        <tr>
            <th><b>PERHITUNGAN TAGIHAN PT. ADIRA DINAMIKA MULTI FINANCE
                    ({{ $type == 1 ? 'OFFICE BOY' : 'SECURITY' }})</b></th>
        </tr>
        <tr>
            <th><b>PERIODE {{ $periode }}</b></th>
        </tr>
        <tr>
            <th><b>AREA {{ $region->name }}</b></th>
        </tr>
        <tr></tr>
        <tr style="border: #020202">
            <th><b>No</b></th>
            <th><b>BRANCH NAME</b></th>
            <th><b>BRANCH CODE</b></th>
            <th><b>BRANCH DETAIL</b></th>
            <th><b>TANGGAL MASUK</b></th>
            <th><b>TANGGAL KELUAR</b></th>
            <th><b>GAJI POKOK</b></th>
            <th><b>BPJS TENAGA KERJA (4.24%) </b></th>
            <th><b>BPJS KESEHATAN ( 4%) </b></th>
            <th><b>BPJS PENSIUN (2%) </b></th>
            <th><b>TOTAL PEMBAYARAN </b></th>
            <th><b>NAMA PELAKSANA </b></th>
            <th><b>JABATAN </b></th>
            <th><b>NIK </b></th>
            <th><b>TANGGAL LAHIR </b></th>
            <th><b>JENIS KELAMIN</b></th>
            <th><b>REGIONAL CODE</b></th>
            <th><b>REGIONAL NAME</b></th>
            <th><b>INVOICE PERIODE</b></th>
            <th><b>NAMA VENDOR</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payroll as $item => $value)
            <tr style="border: #020202">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->employee->branch->name }}</td>
                <td>{{ $value->employee->branch->code }}</td>
                <td>{{ $value->employee->branch->description }}</td>
                <td>{{ $value->employee->tgl_masuk }}</td>
                <td>{{ $value->employee->tgl_keluar ?? '-' }}</td>
                <td>{{ $value->gapok }}</td>
                <td>{{ $value->bpjs_ketegakerjaan }}</td>
                <td>{{ $value->bpjs_kesehatan }}</td>
                <td>{{ $value->bpjs_pensiun }}</td>
                <td>{{ $value->total }}</td>
                <td>{{ $value->employee->name }}</td>
                <td>{{ $value->employee->jabatan == 'ob' ? 'OB' : 'SECURITY' }}</td>
                <td>{{ $value->employee->nik }}</td>
                <td>{{ $value->employee->tgl_lahir }}</td>
                <td>{{ $value->employee->jenis_kelamin }}</td>
                <td>{{ $region->code }}</td>
                <td>{{ $region->name }}</td>
                <td>{{ $value->periode }}</td>
                <td>{{ $value->employee->vendor->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
