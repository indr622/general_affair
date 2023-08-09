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
                                    <h5 class="modal-title" id="uploadModalLabel">Upload Security Data</h5>
                                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('bio.upload') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">File</label>
                                            <input type="file" name="file_employee" required class="form-control">
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
                                    <h5 class="modal-title" id="downloadModalLabel">Download Security Data</h5>
                                    <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('bio.download') }}" method="POST">
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
                        <table id="data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal Masuk / Keluar</th>
                                <th>Vendor</th>
                                <th>Branch</th>
                                <th>Region</th>
                            </thead>
                            <tbody>
                                @foreach ($employee as $data => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->nik }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>{{ $value->tgl_lahir }}</td>
                                        <td>{{ $value->tgl_masuk . ' / ' . $value->tgl_keluar ?? '-' }}</td>
                                        <td>{{ $value->vendor->name }}</td>
                                        <td>{{ $value->branch->name }}</td>
                                        <td>{{ $value->branch->region->name }}</td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
