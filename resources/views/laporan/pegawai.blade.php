@extends('layouts.app')

@section('title', 'Laporan Pegawai')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pegawai</h1>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
