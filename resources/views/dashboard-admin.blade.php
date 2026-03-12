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
        <a href="{{ route('admin.profil') }}" class="flex items-center gap-2 hover:opacity-80 transition cursor-pointer">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Admin</span>
        </div>
      </a>

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
    <div class="flex ">

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

            <li class="{{ request()->routeIs('admin.informasiRingkas') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.informasiRingkas') }}" class="block w-full">
                    Dashboard
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.dataPengguna') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.dataPengguna') }}" class="block w-full">
                    Data Pengguna
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.dataMaster') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.dataMaster') }}" class="block w-full">
                    Data Master
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.statistikSistem') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.statistikSistem') }}" class="block w-full">
                    Statistik Sistem
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.registrasiGuru') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.registrasiGuru') }}" class="block w-full">
                    Registrasi Guru
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.aktivitasTerbaru') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.aktivitasTerbaru') }}" class="block w-full">
                    Aktivitas Terbaru
                </a>
            </li>

        </ul>
    </nav>
</aside>
<main class="flex-1 p-8 mt-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- BOX 1 -->
        <div class="bg-white/30 backdrop-blur-sm rounded-3xl shadow-lg 
                    p-6 h-44 hover:scale-105 transition">

            <div class="flex items-center gap-6 h-full">

                <!-- LOGO BESAR -->
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="/images/logogurubk.png"
                         class="w-full h-full object-contain">
                </div>

                <!-- TITLE -->
                <a href="{{ route('admin.registrasiGuru') }}"
                   class="text-lg font-bold text-black underline">
                    Registrasi Guru BK
                </a>

            </div>
        </div>

        <!-- BOX 2 -->
        <a href="{{ route('admin.dataPengguna') }}"
           class="bg-white/30 backdrop-blur-sm rounded-3xl shadow-lg 
                  p-6 h-44 hover:scale-105 transition block">

            <div class="flex items-center gap-4 mb-4">

                <!-- ICON -->
                <div class="w-12 h-12 bg-black/10 rounded-full flex items-center justify-center">
                    <img src="/images/logouser.png"
                         class="w-7 h-7 object-contain">
                </div>

                <h2 class="text-lg font-bold text-black">
                    Data Pengguna
                </h2>
            </div>

            <div class="p-6 rounded-2xl flex items-center justify-center">
    <span class="font-black text-slate-900 text-2xl text-center">
        {{ $totalUser }}
    </span>
</div>
        </a>

        <!-- BOX 3 -->
        <a href="{{ route('admin.dataMaster') }}"
           class="bg-white/30 backdrop-blur-sm rounded-3xl shadow-lg 
                  p-6 h-44 hover:scale-105 transition block">

            <div class="flex items-center gap-4 mb-4">

                <div class="w-12 h-12 bg-black/10 rounded-full flex items-center justify-center">
                    <img src="/images/logodatabase.png"
                         class="w-7 h-7 object-contain">
                </div>

                <h2 class="text-lg font-bold text-black">
                    Data Master
                </h2>
            </div>

            <div class="flex flex-col items-center justify-center h-[calc(100%-64px)]">
        <p class="text-3xl font-bold text-black">0</p>
        <p class="text-sm text-black/70">Total Data</p>
    </div>
        </a>

       <!-- BOX 4 STATISTIK SISTEM -->
<div class="bg-white/30 backdrop-blur-sm rounded-3xl shadow-lg 
            p-6 h-44 hover:scale-105 transition">

    <!-- HEADER (ICON + TITLE) -->
    <div class="flex items-center gap-4 mb-4">
        <div class="w-12 h-12 bg-black/10 rounded-full flex items-center justify-center">
            <img src="/images/logostatistik.png" class="w-7 h-7 object-contain">
        </div>
        <h2 class="text-lg font-bold text-black">
            Statistik Sistem
        </h2>
    </div>

    <!-- KONTEN (ANGKA + DIAGRAM) -->
    <div class="flex justify-between items-center h-[calc(100%-64px)]">
        
        <!-- ANGKA DI TENGAH KIRI -->
        <div class="flex flex-col items-center justify-center">
            <p class="text-3xl font-bold text-black">0%</p>
        </div>

        <!-- DONUT CHART DI KANAN -->
        <div class="relative w-20 h-20">
            <!-- LINGKARAN GREY SEBAGAI BACKGROUND -->
            <div class="absolute inset-0 rounded-full "></div>

            <!-- LINGKARAN ISI / PROGRESS -->
            <div id="progressCircle" class="absolute inset-0 rounded-full bg-purple-500 origin-center transform rotate-[-90deg]">
            </div>

            <!-- ANGKA DI TENGAH LINGKARAN -->
            <div class="absolute inset-0 flex items-center justify-center">
                <span id="percentText" class="text-xs font-semibold text-white">0%</span>
            </div>
        </div>

    </div>
</div>
       

  

</main>
</body>
    </div> 
</div> 

<!-- FOOTER -->
<footer class="w-full text-white/80 text-center py-2 text-[12px] mt-auto">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>
</body>
</html>