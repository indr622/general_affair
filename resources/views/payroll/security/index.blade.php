@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm" data-coreui-toggle="modal"
                        data-coreui-target="#uploadModal">
                        Upload <i class="fas fa-upload"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-coreui-toggle="modal"
                        data-coreui-target="#downloadModal">
                        Download <i class="fas fa-download"></i>
                    </button>

                    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel">Upload Payroll Office Boy Data</h5>
                                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('payroll.upload') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">File</label>
                                            <input type="file" name="file_payroll" required class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-coreui-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Upload <i
                                                    class="fas fa-upload"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="downloadModalLabel">Download Payroll Office Boy </h5>
                                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('payroll.download') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="2">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Nama Vendor</label>
                                            <select name="vendor_id" class="form-control">
                                                @foreach ($vendor as $item => $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="">Region</label>
                                            <select name="region_id" class="form-control">
                                                @foreach ($region as $item => $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="period">Periode</label>
                                            <select class="form-control" name="periode" required>
                                                @foreach ($bulan as $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary  btn-sm"
                                            data-coreui-dismiss="modal">Close</button>
                                        <button type="submit" id="download" class="btn btn-success btn-sm">Download <i
                                                class="fas fa-download"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <table id="data" class="table table-striped  nowrap" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>Employee</th>
                                <th>GAJI POKOK</th>
                                <th>BPJS TENAGA KERJA (4.24%)</th>
                                <th>BPJS KESEHATAN ( 4%)</th>
                                <th>BPJS PENSIUN (2%)</th>
                                <th>TOTAL PEMBAYARAN</th>
                                <th>PERIODE</th>
                            </thead>
                            <tbody>
                                @forelse ($payroll as $item=>$value)
                                    @php
                                        $dateString = $value->periode;
                                        $date = \Carbon\Carbon::createFromFormat('md', $dateString)->setYear(now()->year);
                                        
                                        $formattedDate = $date->format('F Y');
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Nama :{{ $value->employee->name }} <br>
                                            NIK : {{ $value->employee->nik }}
                                        </td>
                                        <td>{{ number_format($value->gapok, 2) }}</td>
                                        <td>{{ number_format($value->bpjs_ketegakerjaan, 2) }}</td>
                                        <td>{{ number_format($value->bpjs_kesehatan, 2) }}</td>
                                        <td>{{ number_format($value->bpjs_pensiun, 2) }}</td>
                                        <td>{{ number_format($value->total, 2) }}</td>
                                        <td>{{ $formattedDate }}</td>
                                    </tr>
                                @empty
                                    <p>Data Kosong</p>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
