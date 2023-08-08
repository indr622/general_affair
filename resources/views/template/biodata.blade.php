<table border="1">
    <thead>
        <tr></tr>
        <tr>
            <th><b>{{ $vendor->description }}</b></th>
        </tr>
        <tr>
            <th><b>{{ $type == 1 ? 'BIODATA OFFICE BOY' : 'BIODATA SECURITY' }}</b></th>
        </tr>
        <tr>
            <th><b>AREA : {{ $region->name }}</b></th>
        </tr>
        <tr></tr>
        <tr style="border: #020202">
            <th><b>No</b></th>
            <th><b>BRANCH NAME</b></th>
            <th><b>BRANCH CODE</b></th>
            <th><b>BRANCH DETAIL</b></th>
            <th><b>TANGGAL MASUK</b></th>
            <th><b>TANGGAL KELUAR</b></th>
            <th><b>NAMA PELAKSANA</b></th>
            <th><b>JABATAN</b></th>
            <th><b>NIK</b></th>
            <th><b>TANGGAL LAHIR</b></th>
            <th><b>JENIS KELAMIN</b></th>
            <th><b>REGIONAL CODE</b></th>
            <th><b>REGIONAL NAME</b></th>
            <th><b>PERIODE INVOICE</b></th>
            <th><b>NAM VENDOR</b></th>
        </tr>
    </thead>
    <tbody>



        @forelse ($employee as $item => $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->branch->name }}</td>
                <td>{{ $value->branch->code }}</td>
                <td>{{ $value->branch->description }}</td>
                <td>{{ $value->tgl_masuk }}</td>
                <td>{{ $value->tgl_keluar ?? '-' }}</td>
                <td>{{ $value->name }}</td>
                <td>OB</td>
                <td>{{ $value->nik }}</td>
                <td>{{ $value->tgl_lahir }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ $region->name }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ date('m') . date('y') }}</td>
                <td>{{ $vendor->name }}</td>
            </tr>
        @empty
            <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> </td>
                <td>OB</td>
                <td></td>
                <td></td>
                <td>L</td>
                <td></td>
                <td>{{ $vendor->name }}</td>
                <td>{{ date('m') . date('y') }}</td>
                <td>{{ $vendor->name }}</td>
            </tr>
        @endforelse


    </tbody>
</table>
