@extends('layouts.app') <!-- Pastikan ini sesuai dengan layout yang digunakan -->

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
    </div>


    <!-- Flash Message -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Nik</th>
                            <th>Status</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>JenisKelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->nip }}</td>
                            <td>{{ $pegawai->nik }}</td>
                            <td>{{ $pegawai->status }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->golongan }}</td>
                            <td>{{ $pegawai->jeniskelamin }}</td>
                            <td>{{ $pegawai->alamat }}</td>

                            <td>
                                <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
