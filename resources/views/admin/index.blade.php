@extends('layouts.app')

@section('content')

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-2xl font-bold">200</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Guru</p>
        <h2 class="text-2xl font-bold">20</h2>
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

<div class="grid grid-cols-3 gap-6">

    <div class="col-span-2 bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-4">Statistik Bulanan</h3>
        <canvas id="myChart"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-4">Informasi Ringkas</h3>
        <ul class="text-sm space-y-2">
            <li>Total Pengguna: 220</li>
            <li>Total Guru BK: 15</li>
            <li>Siswa Aktif: 200</li>
        </ul>
    </div>
</div>

<div class="grid grid-cols-2 gap-6 mt-6">

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Data Master</h3>
        <p>Jumlah Data Pengguna: 220</p>
        <p>Jumlah Guru BK: 15</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Aktivitas Terbaru</h3>
        <ul class="text-sm list-disc ml-4">
            <li>Admin login</li>
            <li>Pengguna baru ditambahkan</li>
            <li>Laporan konseling masuk</li>
        </ul>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets: [{
            label: 'Konseling',
            data: [12, 19, 3, 5, 2, 8],
        }]
    }
});
</script>

@endsection