@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar cuti</h1>
        <a href="{{ route('cuti.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Cuti
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

        <!-- DataTable -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Cuti</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Jenis Cuti</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>status</th>
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

                <!-- status cuti -->
                    @if($cuti->status == 'pending')
                        <form action="{{ route('cuti.updateStatus', $cuti->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="status" value="disetujui">
                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        <form action="{{ route('cuti.updateStatus', $cuti->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    @else
                        <span class="badge badge-{{ $cuti->status == 'approved' ? 'success' : 'danger' }}">
                            {{ ucfirst($cuti->status) }}
                        </span>
                    @endif

                    
                <td>
                    <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection
