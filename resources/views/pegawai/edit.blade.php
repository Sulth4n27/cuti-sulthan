@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pegawai</h1>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Edit Pegawai -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pegawai</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Metode HTTP PUT untuk update -->

                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pegawai->nama) }}" placeholder="Masukkan nama pegawai">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nip">nip</label>
                    <input type="nip" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $pegawai->nip) }}" placeholder="Masukkan nip pegawai">
                    @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">nik</label>
                    <input type="nik" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $pegawai->nik) }}" placeholder="Masukkan nik pegawai">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Status Pegawai --</option>
                        <option value="ASN" {{ old('status', $pegawai->status ?? '') == 'ASN' ? 'selected' : '' }}>ASN</option>
                        <option value="NON ASN" {{ old('status', $pegawai->status ?? '') == 'NON ASN' ? 'selected' : '' }}>NON ASN</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih jabatan anda --</option>
                        <option value="Kepala Badan BKPSDM" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kepala Badan BKPSDM' ? 'selected' : '' }}>Kepala Badan BKPSDM</option>
                        <option value="Sekretaris" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="Kepala Bagian Umum" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kepala Bagian Umum' ? 'selected' : '' }}>Kepala Bagian Umum</option>
                        <option value="Kabid Pengambangan sumber daya manusia" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid Pengambangan sumber daya manusia' ? 'selected' : '' }}>Kabid Pengambangan sumber daya manusia</option>
                        <option value="Kabid perencanaan dan pengembangan" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid perencanaan dan pengembangan' ? 'selected' : '' }}>Kabid perencanaan dan pengembangan</option>
                        <option value="Kabid Mutasi" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Kabid Mutasi' ? 'selected' : '' }}>Kabid Mutasi</option>
                        <option value="Bagian Keuangan" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Bagian Keuangan' ? 'selected' : '' }}>Bagian Keuangan</option>
                        <option value="Staff BKPSDM" {{ old('jabatan', $pegawai->jabatan ?? '') == 'Staff BKPSDM' ? 'selected' : '' }}>Staff BKPSDM</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="golongan">golongan</label>
                    <select name="golongan" id="golongan" class="form-control @error('golongan') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Golongan anda --</option>
                        <option value="1A" {{ old('golongan', $pegawai->golongan ?? '') == '1A' ? 'selected' : '' }}>1A</option>
                        <option value="1B" {{ old('golongan', $pegawai->golongan ?? '') == '1B' ? 'selected' : '' }}>1B</option>
                        <option value="1C" {{ old('golongan', $pegawai->golongan ?? '') == '1C' ? 'selected' : '' }}>1C</option>
                        <option value="1D" {{ old('golongan', $pegawai->golongan ?? '') == '1D' ? 'selected' : '' }}>1D</option>

                        <option value="2A" {{ old('golongan', $pegawai->golongan ?? '') == '2A' ? 'selected' : '' }}>2A</option>
                        <option value="2B" {{ old('golongan', $pegawai->golongan ?? '') == '2B' ? 'selected' : '' }}>2B</option>
                        <option value="2C" {{ old('golongan', $pegawai->golongan ?? '') == '2C' ? 'selected' : '' }}>2C</option>
                        <option value="2D" {{ old('golongan', $pegawai->golongan ?? '') == '2D' ? 'selected' : '' }}>2D</option>

                        <option value="3A" {{ old('golongan', $pegawai->golongan ?? '') == '3A' ? 'selected' : '' }}>3A</option>
                        <option value="3B" {{ old('golongan', $pegawai->golongan ?? '') == '3B' ? 'selected' : '' }}>3B</option>
                        <option value="3C" {{ old('golongan', $pegawai->golongan ?? '') == '3C' ? 'selected' : '' }}>3C</option>
                        <option value="3D" {{ old('golongan', $pegawai->golongan ?? '') == '3D' ? 'selected' : '' }}>3D</option>

                        <option value="4A" {{ old('golongan', $pegawai->golongan ?? '') == '4A' ? 'selected' : '' }}>4A</option>
                        <option value="4B" {{ old('golongan', $pegawai->golongan ?? '') == '4B' ? 'selected' : '' }}>4B</option>
                        <option value="4C" {{ old('golongan', $pegawai->golongan ?? '') == '4C' ? 'selected' : '' }}>4C</option>
                        <option value="4D" {{ old('golongan', $pegawai->golongan ?? '') == '4D' ? 'selected' : '' }}>4D</option>
                    </select>
                @error('golongan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

                <div class="form-group">
                    <label for="jeniskelamin">Jeniskelamin</label>
                    <select name="jeniskelamin" id="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih jeniskelamin anda --</option>
                        <option value="LK" {{ old('jeniskelamin', $pegawai->jeniskelamin ?? '') == 'LK' ? 'selected' : '' }}>LK</option>
                        <option value="PR" {{ old('jeniskelamin', $pegawai->jeniskelamin ?? '') == 'PR' ? 'selected' : '' }}>PR</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat pegawai">{{ old('alamat', $pegawai->alamat) }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
