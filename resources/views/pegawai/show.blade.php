@extends('layouts.app')

@section('title', 'Detail Pegawai')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pegawai</h1>
    </div>

     <!-- Detail Pegawai -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Nama</h6>
                    <p>{{ $pegawai->nama }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">nip</h6>
                    <p>{{ $pegawai->nip }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">nik</h6>
                    <p>{{ $pegawai->nik }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">status</h6>
                    <p>{{ $pegawai->status }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Jabatan</h6>
                    <p>{{ $pegawai->jabatan }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">golongan</h6>
                    <p>{{ $pegawai->golongan }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="font-weight-bold">jeniskelamin</h6>
                    <p>{{ $pegawai->jeniskelamin }}</p>
                </div>

                <div class="col-md-6">
                    <h6 class="font-weight-bold">Alamat</h6>
                    <p>{{ $pegawai->alamat }}</p>
                </div>

                 <!-- Tombol Aksi -->
            <div class="mt-3">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary">Edit</a>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
