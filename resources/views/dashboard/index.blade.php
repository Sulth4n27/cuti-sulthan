@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Statistik Dasar -->
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Pegawai</h5>
                    <h2 class="text-primary"><i class="fas fa-users fa-2x text-gray-300"></i>
                        {{ $totalPegawai }}</h2>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Cuti</h5>
                    <h2 class="text-success"><i class="fas fa-calendar fa-2x text-gray-300"></i>
                        {{ $totalCuti }}</h2>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Cuti Bulan Ini</h5>
                    <h2 class="text-warning">{{ $cutiBulanIni }}</h2>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Grafik -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Grafik Cuti Per Bulan</h5>
                    <canvas id="cutiChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data Grafik Cuti Per Bulan
    const ctx = document.getElementById('cutiChart').getContext('2d');
    const cutiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($dataCutiPerBulan->toArray())) !!},
            datasets: [{
                label: 'Total Cuti',
                data: {!! json_encode(array_values($dataCutiPerBulan->toArray())) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
