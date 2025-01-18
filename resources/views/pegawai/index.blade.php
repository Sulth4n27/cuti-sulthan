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
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('pegawai.index') }}">
                <div class="row">
                    <!-- Input Pencarian -->
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama, NIP, atau NIK" value="{{ request('search') }}">
                    </div>
                    <!-- Filter Jabatan -->
                    <div class="col-md-3">
                        <select name="jabatan" class="form-control">
                            <option value="">Semua Jabatan</option>
                            @foreach($jabatans as $jab)
                                <option value="{{ $jab }}" {{ request('jabatan') == $jab ? 'selected' : '' }}>{{ $jab }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Filter Golongan -->
                    <div class="col-md-2">
                        <select name="golongan" class="form-control">
                            <option value="">Semua Golongan</option>
                            @foreach($golongans as $gol)
                                <option value="{{ $gol }}" {{ request('golongan') == $gol ? 'selected' : '' }}>{{ $gol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Filter Status -->
                    <div class="col-md-2">
                        <select name="status" class="form-control">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $stat)
                                <option value="{{ $stat }}" {{ request('status') == $stat ? 'selected' : '' }}>{{ $stat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tombol Filter -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pegawais as $pegawai)
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
                                <a href="{{ route('pegawai.show', $pegawai) }}" class="btn btn-info btn-sm"><i class="fas fa-eyes"></i>Detail</a>
                                <a href="{{ route('pegawai.edit', $pegawai) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <form action="{{ route('pegawai.destroy', $pegawai) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Data Pegawai tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Navigasi Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $pegawais->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
