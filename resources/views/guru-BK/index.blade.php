@extends('layouts.guru')

@section('content')

<!-- CARD ATAS -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-2xl font-bold">200</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Konseling</p>
        <h2 class="text-2xl font-bold">50</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Pelanggaran</p>
        <h2 class="text-2xl font-bold text-red-500">25</h2>
    </div>

</div>

<!-- GRID UTAMA -->
<div class="grid grid-cols-2 gap-6">

    <!-- JADWAL HARI INI -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Jadwal Konseling Hari Ini</h3>

        <ul class="space-y-2 text-sm">
            <li>08.00 - 08.30 | Nabila (Kelas X RPL 1)</li>
            <li>09.00 - 09.30 | Andi (Kelas XI TKJ 2)</li>
            <li>10.00 - 10.30 | Siti (Kelas XII RPL 3)</li>
        </ul>

        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">
            Tambah Jadwal
        </button>
    </div>

    <!-- GRAFIK STATISTIK -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Statistik Bulanan</h3>
        <canvas id="chartGuru"></canvas>
    </div>

</div>

<!-- GRID BAWAH -->
<div class="grid grid-cols-2 gap-6 mt-6">

    <!-- JADWAL MINGGUAN -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Jadwal Konseling Minggu Ini</h3>
        <p>Senin - 5 sesi</p>
        <p>Selasa - 3 sesi</p>
        <p>Rabu - 4 sesi</p>
        <p>Kamis - 2 sesi</p>
    </div>

    <!-- SISWA TINDAK LANJUT -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Siswa Tindak Lanjut</h3>

        <ul class="text-sm space-y-2">
            <li>Rina - Perlu Konseling Lanjutan</li>
            <li>Budi - Pelanggaran Berat</li>
            <li>Andi - Konseling Karir</li>
        </ul>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartGuru');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets: [{
            label: 'Jumlah Konseling',
            data: [10, 20, 15, 30, 25, 40],
        }]
    }
});
</script>

@endsection