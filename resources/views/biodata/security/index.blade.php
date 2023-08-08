@extends('layouts.app')

@section('title', 'Data Employee (Security)')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header">
                    <a href="" class="btn btn-primary btn-sm">Tambah Securit <i class="fas fa-plus"></i></a>
                    <a href="" class="btn btn-success btn-sm">Upload <i class="fas fa-upload"></i></a>
                    <a href="" class="btn btn-success btn-sm">Download <i class="fas fa-download"></i></a>
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
                                <th>AKSI</th>
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
                                        <td class="text-center">
                                            <a href="{{ route('bio.edit', $value->id) }}" class="btn btn-sm btn-warning"
                                                title="EDIT"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('bio.destroy', $value->id) }}" class='ml-1 delete-form'
                                                method='POST'>
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-danger btn-sm text-white"> <i
                                                        class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
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
