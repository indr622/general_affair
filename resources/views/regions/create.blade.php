@extends('layouts.app')

@section('title', 'Tambah Region Data')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Tambah Region Data</div>
                </div>
                <form action="{{ route('regions.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <label for="">Nama Region</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan nama region">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Kode Region</label>
                                    <input type="text" name="code" class="form-control"
                                        placeholder="Masukan kode region">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('regions.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
