@extends('layouts.siswa')

@section('content')

<!-- CARD ATAS -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Poin Saya</p>
        <h2 class="text-2xl font-bold">120</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Status Konseling</p>
        <h2 class="text-lg font-bold text-green-500">Aktif</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Konseling</p>
        <h2 class="text-2xl font-bold">5</h2>
    </div>

</div>

<!-- GRID BAWAH -->
<div class="grid grid-cols-2 gap-6">

    <!-- JADWAL KONSELING -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Jadwal Konseling Saya</h3>

        <p class="text-sm text-gray-500">Senin, 12 Feb 2026</p>
        <p class="mt-2">🕒 10.00 - 10.30</p>
        <p>📍 Ruang BK</p>

        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">
            Lihat Semua Jadwal
        </button>
    </div>

    <!-- RIWAYAT -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-3">Riwayat Konseling</h3>

        <ul class="space-y-2 text-sm">
            <li class="flex justify-between">
                <span>02 Feb 2026 - Konseling Pribadi</span>
                <span class="text-green-500 font-semibold">Selesai</span>
            </li>
            <li class="flex justify-between">
                <span>20 Jan 2026 - Konseling Karir</span>
                <span class="text-green-500 font-semibold">Selesai</span>
            </li>
            <li class="flex justify-between">
                <span>15 Jan 2026 - Konseling Belajar</span>
                <span class="text-red-500 font-semibold">Dibatalkan</span>
            </li>
        </ul>

        <a href="#" class="text-blue-500 text-sm mt-3 inline-block">Lihat Semua →</a>
    </div>

</div>

@endsection