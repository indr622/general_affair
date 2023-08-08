@extends('layouts.app')

@section('title', 'Branch Data')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('branch.create') }}" class="btn btn-primary btn-sm">Tambah Branch <i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>Nama Branch</th>
                                <th>Kode Branch</th>
                                <th>Keterangan</th>
                                <th>Region</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($branch as $data => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td><strong>{{ $value->code }}</strong> </td>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->region->name }} <sup>{{ $value->region->code }}</sup>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('branch.edit', $value->id) }}" class="btn btn-sm btn-warning"
                                                title="EDIT"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('branch.destroy', $value->id) }}"
                                                class='ml-1 delete-form' method='POST'>
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
