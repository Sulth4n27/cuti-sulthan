@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Pegawai -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPegawai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Cuti -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Cuti</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCuti }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cuti Pending -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Cuti Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cutiPending }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cuti Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Cuti Ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cutiDitolak }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuti Berlangsung -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Cuti Berlangsung</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cutiBerlangsung }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Total Pegawai, Total Cuti, Cuti Pending, etc... (Card stats sebelumnya) -->
            <!-- Grafik Statistik Cuti -->
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <h4 class="text-center font-weight-bold">Statistik Cuti Berdasarkan Status</h4>
                        <canvas id="cutiStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <canvas id="cutiStatusChart"></canvas>
<script>
    var ctx = document.getElementById('cutiStatusChart').getContext('2d');
    var cutiStatusChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['ASN', 'NON ASN'],
            datasets: [{
                data: [10, 5],
                backgroundColor: ['#4e73df', '#1cc88a'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>

    @endpush

</div>
<!-- /.container-fluid -->
@endsection
