@extends('layouts.app')

@section('title', 'Report')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <div class="card-tite">Download Report</div>
                </div>

                <form action="{{ route('report.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <label for="">BULAN</label>
                                    <select name="bulan" id="" class="form-control">
                                        <option value="1">Januari</option>
                                        <option value="2">Febuari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>

                            @php
                                $groupedData = App\Models\Payroll::groupByYear()->get();
                                
                            @endphp
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <label for="">TAHUN</label>
                                    <select name="tahun" id="" class="form-control">
                                        @foreach ($groupedData as $data)
                                            <option value="{{ $data->year }}">{{ $data->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button class="btn btn-success" type="submit">Download <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
