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

                    {{-- Upload Modal --}}
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
                                    <input type="hidden" name="type" value="1">
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
                                <th>TOTAL PEMABAYARAN</th>
                                <th>-</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Employee</td>
                                    <td>GAJI POKOK</td>
                                    <td>BPJS TENAGA KERJA (4.24%)</td>
                                    <td>BPJS KESEHATAN ( 4%)</td>
                                    <td>BPJS PENSIUN (2%)</td>
                                    <td>TOTAL PEMABAYARAN</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
