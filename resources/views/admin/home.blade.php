@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Total Pembayaran Sukses Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pembayaran Sukses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 123.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran Sukses (Bulan Ini) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pembayaran Sukses (Bulan Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 123.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran Transfer Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pembayaran Transfer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 123.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran Tunai Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pembayaran Tunai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 123.000</div>
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
