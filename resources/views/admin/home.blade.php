@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Total Total Tamu (Keseluruhan) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Tamu (Keseluruhan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }} Tamu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Tamu (Bulan Ini) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Tamu (Bulan Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMonth }} Tamu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Tamu (Hari Ini) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Tamu (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDay }} Tamu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Row -->
@endsection

@push('js')
@endpush
