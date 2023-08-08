@extends('layouts.app')

@section('title', 'Edit Vendor Data')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Edit Vendor Data</div>
                </div>

                <form action="{{ route('penyedia.update', $vendors->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Nama Vendor</label>
                                    <input type="text" value="{{ $vendors->name }}" name="name" class="form-control"
                                        placeholder="Masukan nama vendor / singkatan">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Keterangan</label>
                                    <input value="{{ $vendors->description }}" type="text" name="description"
                                        class="form-control" placeholder="Masukan Keterangan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('penyedia.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-warning" type="submit">Update <i class="fas fa-edit"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
