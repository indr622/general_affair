@extends('layouts.app')

@section('title', 'Regions Data')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header">
                    <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm">Tambah Region <i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="data" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>#</th>
                                <th>REGION CODE</th>
                                <th>NAMA REGION</th>
                                <th>AKSI</th>
                            </thead>
                            <tbody>
                                @foreach ($regions as $data => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ $value->name }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('regions.edit', $value->id) }}" class="btn btn-sm btn-warning"
                                                title="EDIT"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('regions.destroy', $value->id) }}"
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
