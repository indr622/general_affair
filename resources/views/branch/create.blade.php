@extends('layouts.app')

@section('title', 'Tambah Branch Data')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Tambah Branch Data</div>
                </div>

                <form action="{{ route('branch.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Nama Branch</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Branch" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Kode Branch</label>
                                    <input type="text" name="code" class="form-control"
                                        placeholder="Masukan Kode Branch" value="{{ old('code') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Deskripsi Branch</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Masukan Deskripsi branch" value="{{ old('description') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Region</label>
                                    <select name="region_id" class="form-control" required>
                                        @foreach ($regions as $item => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}
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
                        <button class="btn btn-success" type="submit">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
