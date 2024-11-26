@extends('layouts.app')

@section('title', 'Edit Cuti')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Cuti</h1>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
<!-- Form Edit Pegawai -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Cuti</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Metode HTTP PUT untuk update -->

<!-- Pegawai Dropdown -->
<div class="form-group">
    <label for="pegawai_id">Nama Pegawai</label>
    <select name="pegawai_id" id="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror">
        <option value="">-- Pilih Pegawai --</option>
        @foreach ($pegawais as $pegawai)
        <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
            {{ $pegawai->nama }}
        </option>
        @endforeach
    </select>
    @error('pegawai_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

 <!-- Jenis Cuti -->
 <div class="form-group">
    <label for="jenis_cuti">Jenis Cuti</label>
    <input type="text" name="jenis_cuti" id="jenis_cuti" class="form-control @error('jenis_cuti') is-invalid @enderror" value="{{ old('jenis_cuti') }}">
    @error('jenis_cuti')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<!-- Tanggal Mulai -->
<div class="form-group">
    <label for="tanggal_mulai">Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}">
    @error('tanggal_mulai')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<!-- Tanggal Selesai -->
<div class="form-group">
    <label for="tanggal_selesai">Tanggal Selesai</label>
    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}">
    @error('tanggal_selesai')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<!-- Alasan -->
<div class="form-group">
    <label for="alasan">Alasan</label>
    <textarea name="alasan" id="alasan" rows="3" class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukkan alasan atau alasan cuti">{{ old('alasan') }}</textarea>
    @error('alasan')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Status Cuti</label>
    <select name="status" id="status" class="form-control">
        <option value="pending" {{ $cuti->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $cuti->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
        <option value="rejected" {{ $cuti->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>
</div>


<!-- Submit Button -->
<button type="submit" class="btn btn-primary">
    <i class="fas fa-save"></i> Simpan perubahan
</button>
</form>
</div>
</div>
</div>
@endsection


