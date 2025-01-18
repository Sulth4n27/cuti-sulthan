@extends('layouts.app')

@section('title', 'Laporan Cuti')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Cuti</h1>
    <a href="{{ route('laporan.cuti.pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
    <label for="start_date">Tanggal Mulai:</label>
        <input type="date" id="start_date" class="form-control d-inline" style="width: auto;">
        <label for="end_date">Tanggal Selesai:</label>
        <input type="date" id="end_date" class="form-control d-inline" style="width: auto;">
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Alasan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cutis as $cuti)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cuti->pegawai->nama }}</td>
                        <td>{{ $cuti->jenis_cuti }}</td>
                        <td>{{ $cuti->tanggal_mulai }}</td>
                        <td>{{ $cuti->tanggal_selesai }}</td>
                        <td>{{ $cuti->alasan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endsection
