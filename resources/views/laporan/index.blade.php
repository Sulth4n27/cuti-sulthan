@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Cuti Pegawai</h1>
    <a href="{{ route('laporan.cuti.pdf') }}" class="btn btn-danger mb-3">Export PDF</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cutis as $cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cuti->pegawai->nama }}</td>
                <td>{{ $cuti->tanggal_mulai }}</td>
                <td>{{ $cuti->tanggal_selesai }}</td>
                <td>{{ $cuti->alasan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
