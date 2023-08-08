@extends('layouts.app')

@section('title', 'Edit User Data')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Edit User Data</div>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan nama lengkap">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="Masukan username">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Region</label>
                                    <select name="region_id" class="form-control" required>
                                        {{-- @foreach ($regions as $item => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                | Code : {{ $value->code }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group my-2">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control">
                                        {{-- @foreach ($roles as $item => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('users.index') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
