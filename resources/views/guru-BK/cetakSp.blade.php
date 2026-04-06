<!DOCTYPE html>
<html>
<head>
    <title>Surat Peringatan - {{ $p->siswa->name ?? 'Siswa' }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; line-height: 1.6; padding: 30px; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; pb-2; mb-5; }
        .isi-surat { margin-top: 20px; }
        .identitas { margin-left: 30px; margin-bottom: 20px; }
        .footer { margin-top: 50px; float: right; text-align: center; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h2 style="margin:0;">PEMERINTAH PROVINSI / YAYASAN</h2>
        <h1 style="margin:0;">SMA / SMK NEGERI SEKOLAH KITA</h1>
        <p style="margin:0;">Jl. Alamat Sekolah No. 123, Telp: (021) 123456</p>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <h3 style="text-decoration: underline;">SURAT PERINGATAN ({{ $p->kategori_sp ?? 'SP' }})</h3>
        <p>Nomor: {{ $p->id_pelanggaran }}/SP/{{ date('Y') }}</p>
    </div>

    <div class="isi-surat">
        <p>Yang bertanda tangan di bawah ini, Guru BK SMA Sekolah Kita menerangkan bahwa:</p>
        <table class="identitas">
            <tr><td>Nama</td><td>: <strong>{{ $p->siswa->name ?? 'N/A' }}</strong></td></tr>
            <tr><td>NISN</td><td>: {{ $p->siswa->nisn ?? '-' }}</td></tr>
            <tr><td>Kelas</td><td>: {{ $p->siswa->kelas ?? '-' }}</td></tr>
        </table>

        <p>Telah melakukan pelanggaran disiplin sekolah berupa:</p>
        <div style="background: #f9f9f9; padding: 10px; border: 1px solid #ddd;">
            <strong>{{ $p->jenis_pelanggaran }}</strong><br>
            Keterangan: {{ $p->sanksi }}
        </div>

        <p>Demikian surat peringatan ini dibuat agar siswa yang bersangkutan dapat memperbaiki perilaku dan mentaati tata tertib sekolah di kemudian hari.</p>
    </div>

    <div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-guru-bk') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>

    <div class="footer">
        <p>{{ date('d F Y') }}</p>
        <p>Guru BK,</p>
        <br><br><br>
        <p><strong>( ____________________ )</strong></p>
    </div>
</body>
</html>