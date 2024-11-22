@extends('layouts.app')

@section('content')
<h1>Daftar Cuti</h1>
<a href="{{ route('cuti.create') }}" class="btn btn-primary">Tambah Cuti</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Jenis Cuti</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Aksi</th>
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
            <td>
                <a href="{{ route('cuti.show', $cuti->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
