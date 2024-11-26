@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <!-- Statistik Jumlah Pegawai -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Total Pegawai</h5>
                    <h2>{{ $totalPegawai }}</h2>
                </div>
            </div>
        </div>

        <!-- Statistik Jumlah Cuti -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Total Cuti</h5>
                    <h2>{{ $totalCuti }}</h2>
                </div>
            </div>
        </div>

        <!-- Statistik Cuti Sedang Berlangsung -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5>Cuti Berlangsung</h5>
                    <h2>{{ $cutiBerlangsung }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
