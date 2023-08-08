@extends('layouts.app')

@section('title', 'User Data')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah User <i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>USERNAME</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>REGION</th>
                                <th>ROLE</th>
                                <th>AKSI</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $data => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->region->name }} <sup>{{ $value->region->code }}</sup>
                                        </td>
                                        <td>{{ $value->roles[0]['name'] }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $value->id) }}" class="btn btn-sm btn-warning"
                                                title="EDIT"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('users.destroy', $value->id) }}" class='ml-1 delete-form'
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
