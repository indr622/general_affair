@extends('layouts.app')

@section('title', 'Vendor Data')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('penyedia.create') }}" class="btn btn-primary btn-sm">Tambah vendor<i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>Nama Vendor</th>
                                <th>Total Plus PPN</th>
                                <th>Total Karyawan</th>
                                <th>AKSI</th>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $data => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('penyedia.edit', $value->id) }}"
                                                class="btn btn-sm btn-warning" title="EDIT"><i
                                                    class="fas fa-edit"></i></a>
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
