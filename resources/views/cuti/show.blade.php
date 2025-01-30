@extends('layouts.app')

@section('title', 'Detail Cuti')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Cuti</h1>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Detail Cuti -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Cuti Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Nama Pegawai</h6>
                    <p>{{ $cuti->pegawai->nama }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Jenis Cuti</h6>
                    <p>{{ $cuti->jenis_cuti }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Tanggal Mulai</h6>
                    <p>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Tanggal Selesai</h6>
                    <p>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
