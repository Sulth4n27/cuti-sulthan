@extends('layouts.app')

@section('title', 'Tambah Cuti')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Cuti</h1>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Tambah Cuti -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Cuti</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('cuti.store') }}" method="POST">
                @csrf <!-- Token keamanan CSRF -->

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
                    <label for="jenis_cuti">jenis_cuti</label>
                    <select name="jenis_cuti" id="jenis_cuti" class="form-control @error('jenis_cuti') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih jenis cuti anda --</option>
                        <option value="cuti sakit" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti sakit' ? 'selected' : '' }}>cuti sakit</option>
                        <option value="cuti menikah" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti menikah' ? 'selected' : '' }}>cuti menikah</option>
                        <option value="cuti melahirkan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti melahirkan' ? 'selected' : '' }}>cuti melahirkan</option>
                        <option value="cuti pendidikan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti pendidikan' ? 'selected' : '' }}>cuti pendidikan</option>
                        <option value="cuti tahunan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti tahunan' ? 'selected' : '' }}>cuti tahunan</option>
                        <option value="cuti bersama" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti bersama' ? 'selected' : '' }}>cuti bersama</option>
                        <option value="cuti menikahkan anak" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti menikahkan anak' ? 'selected' : '' }}>cuti menikahkan anak</option>
                        <option value="cuti liburan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti liburan' ? 'selected' : '' }}>cuti liburan</option>
                        <option value="cuti hari libur nasional" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti hari libur nasional' ? 'selected' : '' }}>cuti hari libur nasional</option>
                        <option value="cuti hari besar keagamaan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti hari besar keagamaan' ? 'selected' : '' }}>cuti hari besar keagamaan</option>
                        <option value="cuti kedukaan" {{ old('jenis_cuti', $pegawai->jenis_cuti ?? '') == 'cuti kedukaan' ? 'selected' : '' }}>cuti kedukaan</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="user_id">Nama user</label>
                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="">-- Pilih user --</option>
                        @foreach ($user as $users)
                        <option value="{{ $users->id }}" {{ old('user_id') == $users->id ? 'selected' : '' }}>
                            {{ $users->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}


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


                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
