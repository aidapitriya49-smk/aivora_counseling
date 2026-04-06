<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pelanggaran</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Pelanggaran</h2>
    <p>Periode: {{ $tanggal_mulai }} s/d {{ $tanggal_selesai }}</p>
    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Jenis Pelanggaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggarans as $p)
            <tr>
                <td>{{ $p->siswa->name ?? 'N/A' }}</td>
                <td>{{ $p->jenis_pelanggaran }}</td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
