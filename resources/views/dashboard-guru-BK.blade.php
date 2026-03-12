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
        <a href="{{ route('guru-bk.profil') }}" class="flex items-center gap-2 group cursor-pointer">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/teacher.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Guru BK</span>
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
                <a href="{{ route('guru-bk.dataSiswa') }}" class="block w-full">
                    Data Siswa
                </a>
            </li>

            <li class="{{ request()->routeIs('guru-bk.jadwal-konseling') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('guru-bk.jadwal-konseling') }}" class="block w-full">
                    Jadwal Konseling
                </a>
            </li>

            <li class="{{ request()->routeIs('guru-bk.pelanggaran') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('guru-bk.pelanggaran') }}" class="block w-full">
                    Pelanggaran
                </a>
            </li>

            <li class="{{ request()->routeIs('guru-bk.tindak_lanjut') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('guru-bk.tindak_lanjut') }}" class="block w-full">
                    Tindak Lanjut
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.aktivitasTerbaru') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.aktivitasTerbaru') }}" class="block w-full">
                    Laporan & Export
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.aktivitasTerbaru') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <a href="{{ route('admin.aktivitasTerbaru') }}" class="block w-full">
                    Backup
                </a>
            </li>

        </ul>
    </nav>
</aside>
<main class="flex-1 p-8 mt-10">

    <div class="flex flex-col gap-6">

        <!-- BOX DATA SISWA -->
        <a href="#"
           class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg 
                  h-28 px-6 flex items-center justify-between hover:scale-105 transition">

            <!-- ICON -->
            <div class="w-14">
                <img src="/images/penggunalogo.png" class="w-10 h-10 object-contain">
            </div>

            <!-- TEXT -->
            <div class="text-center">
                <p class="font-semibold text-black text-lg">Data Siswa</p>
                <p class="text-sm text-black">50</p>
            </div>

            <!-- PANAH -->
            <div class="text-3xl text-black">
                →
            </div>

        </a>


        <!-- BOX JADWAL KONSELING -->
        <a href="#"
           class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg 
                  h-28 px-6 flex items-center justify-between hover:scale-105 transition">

            <div class="w-14">
                <img src="/images/pesanlogo.png" class="w-10 h-10 object-contain">
            </div>

            <div class="text-center">
                <p class="font-semibold text-black text-lg">Jadwal Konseling</p>
                <p class="text-sm text-black">50</p>
            </div>

            <div class="text-3xl text-black">
                →
            </div>

        </a>


        <!-- BOX PELANGGARAN -->
        <a href="#"
           class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg 
                  h-28 px-6 flex items-center justify-between hover:scale-105 transition">

            <div class="w-14">
                <img src="/images/logoperingatan.png" class="w-10 h-10 object-contain">
            </div>

            <div class="text-center">
                <p class="font-semibold text-black text-lg">Pelanggaran</p>
                <p class="text-sm text-black">50</p>
            </div>

            <div class="text-3xl text-black">
                →
            </div>

        </a>

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