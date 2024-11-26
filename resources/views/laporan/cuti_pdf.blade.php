<!DOCTYPE html>
<html>
<head>
    <title>Laporan Cuti</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Cuti Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jenis Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Alasan</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
