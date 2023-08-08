@extends('layouts.app')

@section('title', 'Edit Region Data')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Edit Region Data</div>
                </div>
                <form action="{{ route('regions.update', $regions->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <label for="">Nama Region</label>
                                    <input type="text" value="{{ $regions->name }}" name="name" class="form-control"
                                        placeholder="Masukan nama region">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Kode Region</label>
                                    <input type="text" name="code" value="{{ $regions->code }}" class="form-control"
                                        placeholder="Masukan kode region">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('regions.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-warning" type="submit">Edit <i class="fas fa-edit"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
