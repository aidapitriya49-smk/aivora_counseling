<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans min-h-screen flex flex-col"
      style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<!-- NAVBAR (FIXED & TRANSPARAN) -->
<header class="fixed top-0 left-0 w-full 
               bg-white/20 backdrop-blur-md 
               border-b border-white/20 
               shadow-md z-50 px-8 py-3">

    <div class="flex items-center">

        <!-- KIRI -->
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white">
                <img src="/images/siswawoman.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Siswa</span>
        </div>

        <!-- KANAN -->
        <div class="flex items-center gap-3 ml-auto">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>

    </div>
</header>

<!-- CONTENT WRAPPER -->
<div class="flex-1 pt-20">
    <div class="flex min-h-screen">

<!-- SIDEBAR --->
<aside class="w-64 mx-auto mt-3">
    
   <!-- LOGO & NAMA SEKOLAH -->
<div class="flex flex-col items-center mb-6">
    <div class="w-14 h-14 overflow-hidden mb-2 -ml-2">
        <img src="/images/logobbc.png" alt="Logo Sekolah" class="w-full h-full object-cover">
    </div>
    <span class="text-white text-center font-bold text-lg">
        SMK BUDI BAKTI CIWIDEY
    </span>
</div>

    <!-- NAVIGASI -->
    <nav class="p-6">
        <ul class="space-y-3 text-white font-medium">

            <li class="{{ request()->routeIs('dashboard-admin') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
    <a href="{{ route('dashboard-admin') }}" class="block w-full">
        Dashboard
    </a>
</li>

            <li class="{{ request()->routeIs('siswa.riwayat_pelanggaran') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('siswa.riwayat_pelanggaran') }}" class="block w-full">
                    Riwayat Pelanggaran
                </a>
            </li>

            <li class="{{ request()->routeIs('siswa.buat_jadwal') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('siswa.buat_jadwal') }}" class="block w-full">
                    Buat Jadwal Konseling
                </a>
            </li>

            <li class="{{ request()->routeIs('siswa.jadwal_konseling') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('siswa.jadwal_konseling') }}" class="block w-full">
                    Jadwal Konseling
                </a>
            </li>

            <li class="{{ request()->routeIs('siswa.riwayat_konseling') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('siswa.riwayat_konseling') }}" class="block w-full">
                    Riwayat Konseling
                </a>
            </li>
        </li>
        </ul>
    </nav>
</aside>

        <!-- MAIN CONTENT -->

 <!-- MAIN -->
    <main class="flex-1 p-6">

    <h1 class="text-2xl font-bold text-white mb-8">
    <div class="bg-blue-200/40 rounded-3xl p-8 min-h-[500px] shadow-lg backdrop-blur-sm">

                @yield('content')<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- CARD 1 -->
    <div class="bg-gray-100 rounded-2xl p-5 flex items-center gap-4 shadow-sm hover:scale-105 transition-transform">
        <div class="text-3xl">📊</div>
        <div>
            <p class="text-sm text-gray-500">Poin Saya</p>
            <p class="text-lg font-semibold text-gray-800">0 Poin</p>
        </div>
    </div>

      <!-- CARD 2 -->
    <div class="bg-gray-100 rounded-2xl p-5 flex items-center gap-4 shadow-sm hover:scale-105 transition-transform">
        <div class="text-3xl">📝</div>
        <div>
            <p class="text-sm text-gray-500">Status Konseling</p>
            <p class="text-lg font-semibold text-gray-800">Aktif</p>
        </div>
    </div>

        <!-- CARD 3 -->
    <div class="bg-gray-100 rounded-2xl p-5 flex items-center gap-4 shadow-sm hover:scale-105 transition-transform">
        <div class="text-3xl">📅</div>
        <div>
            <p class="text-sm text-gray-500">Total Konseling</p>
            <p class="text-lg font-semibold text-gray-800">0 Sesi</p>
        </div>
    </div>
    </div> 

    <!-- JADWAL & RIWAYAT -->
<div class="grid grid-cols-10 md:grid-cols-2 gap-6  mt-10">

<div class="bg-white rounded-2xl p-6 shadow-md">
    <h2 class="text-lg font-semibold mb-2 text-black">
        Jadwal Konseling Saya
    </h2>

    <!-- Garis pendek -->
    <div class="w-90 h-1 bg-gray-400 mb-4 rounded-full"></div>

    <div class="rounded-xl p-4">
        <p class="text-lg font-semibold mb-2 text-black">Senin, 12 Feb 2026</p>
         <div class="flex items-center gap-2 mb-2">
        <span class="text-base">⏰</span>
        <p class="text-lg font-semibold text-black">10.00 - 10.30</p>
    </div>
        <div class="flex items-center gap-2 mb-2">
        <span class="text-base">👩‍🏫</span>
        <p class="text-lg font-semibold text-black">Bu Rina</p>
    </div>
    <!-- KONTAINER UTAMA -->
<div class="flex flex-col gap-2 w-full">

    <!-- STATUS -->
    <div class="flex flex-col gap-2">
        <span class="flex justify-center items-center w-full
                     text-sm bg-orange-100 text-orange-600 py-2 rounded-full font-medium">
            Menunggu Persetujuan
        </span>
        <button class="w-full flex justify-center items-center
                       bg-blue-100/70 text-blue-600
                       py-1.5 rounded-lg text-sm font-medium
                       hover:bg-blue-200/70 transition">
            Lihat Semua Jadwal
        </button>
    </div>

</div>

    </div>
</div>

 <!-- RIWAYAT -->
<div class="bg-white rounded-2xl p-6 shadow-md">

    <h2 class="text-lg font-semibold mb-2 text-black">
        Riwayat Konseling
    </h2>

    <!-- Garis -->
    <div class="w-90 h-1 bg-gray-400 mb-4 rounded-full"></div>

    <div class="flex justify-between border-b py-3">
        <div>
            <p class="text-base font-semibold mb-1 text-black">02 Feb 2026</p>
            <p class="text-gray-700 text-sm text-black">Konseling Pribadi</p>
        </div>
        <span class="text-green-600 text-sm text-black">✔ Selesai</span>
    </div>

    <div class="flex justify-between border-b py-3">
        <div>
            <p class="text-base font-semibold mb-1 text-black">25 Jan 2026</p>
            <p class="text-gray-700 text-sm text-black">Konseling Karir</p>
        </div>
        <span class="text-green-600 text-sm text-black">✔ Selesai</span>
    </div>

    <div class="flex justify-between py-3">
        <div>
            <p class="text-base font-semibold mb-1 text-black">10 Jan 2026</p>
            <p class="text-gray-700 text-sm text-black">Konseling Belajar</p>
        </div>
        <span class="text-red-600 text-sm text-black">✖ Dibatalkan</span>
    </div>

     <!-- LIHAT SEMUA -->
<div class="mt-4 text-center">
    <a href="#" class="text-blue-600 text-sm font-medium hover:underline">
        LIHAT SEMUA  &gt;
    </a>
</div>
        </div>
</div>
            </div>

    </main>
</div> 
<!-- FOOTER -->
<footer class="w-full text-white/80 text-center py-2 text-[12px] mt-auto">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>
</body>
</html>