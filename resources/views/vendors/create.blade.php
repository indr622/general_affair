@extends('layouts.app')

@section('title', 'Tambah Vendor Data')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Tambah Vendor Data</div>
                </div>

                <form action="{{ route('penyedia.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan nama vendor / singkatan">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Keterangan</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Masukan Keterangan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('penyedia.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
