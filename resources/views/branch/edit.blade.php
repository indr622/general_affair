@extends('layouts.app')

@section('title', 'Edit Branch Data')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Edit Branch Data</div>
                </div>

                <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Nama Branch</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Branch" value="{{ $branch->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Kode Branch</label>
                                    <input type="text" name="code" class="form-control"
                                        placeholder="Masukan Kode Branch" value="{{ $branch->code }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Deskripsi Branch</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Masukan Deskripsi branch" value="{{ $branch->description }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Region</label>
                                    <select name="region_id" class="form-control" required>
                                        @foreach ($regions as $item => $value)
                                            <option value="{{ $item }}"
                                                {{ $branch->region_id == $item ? 'selected' : '' }}>
                                                {{ $value->name }}
                                                | Code : {{ $value->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('branch.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-warning" type="submit">Update <i class="fas fa-edit"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
