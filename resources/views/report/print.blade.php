<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LAPORAN</title>

    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">Laporan Bulan : {{ $bulan }} Tahun {{ $tahun }}</h5>
        </div>
        <table border="1">
            <thead>
                <th><b>No</b></th>
                <th><b>BRANCH NAME</b></th>
                <th><b>GAJI POKOK</b></th>
                <th><b>BPJS TENAGA KERJA (4.24%) </b></th>
                <th><b>BPJS KESEHATAN ( 4%) </b></th>
                <th><b>BPJS PENSIUN (2%) </b></th>
                <th><b>TOTAL PEMBAYARAN </b></th>
                <th><b>NAMA PELAKSANA </b></th>
                <th><b>JABATAN </b></th>
                <th><b>NIK </b></th>
            </thead>

            @php
                $data = App\Models\Payroll::all();
            @endphp
            <tbody>
                @foreach ($data as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->employee->branch->name }}</td>
                        <td>{{ number_format($item->gapok, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->bpjs_ketegakerjaan, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->bpjs_kesehatan, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->bpjs_pensiun, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                        <td>{{ $item->employee->name }}</td>
                        <td>{{ $item->employee->jabatan == 'ob' ? 'OFFICE BOY' : 'SECURITY' }}</td>
                        <td>{{ $item->employee->nik }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>


    <script src="{{ asset('') }}js/main.js"></script>

    <script>
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);
        window.print();
    </script>
</body>

</html>
