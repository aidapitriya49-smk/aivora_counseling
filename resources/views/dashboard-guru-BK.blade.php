<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans min-h-screen flex flex-col"
      style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d); background-attachment: fixed;"
      x-data="{ sidebarOpen: false }">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
    <div class="flex items-center justify-between">
        <a href="{{ route('guru-bk.profil') }}" class="flex items-center gap-2 hover:opacity-80 transition cursor-pointer">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="{{ asset('images/' . ($guru->foto ?? 'profilelakilaki.png')) }}?v={{ time() }}" 
                     class="w-full h-full object-cover"
                     onerror="this.src='{{ asset('images/profilelakilaki.png') }}'">
            </div>
            <span class="text-white text-base font-bold uppercase tracking-tight">
                {{ $guru->nama_guru_bk ?? auth()->user()->name }}
            </span>
        </a>

        <div class="flex items-center gap-3">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition shadow-lg">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>

<div class="flex flex-1 pt-24"> 
  <aside class="w-64 flex flex-col items-center">
        <div class="flex flex-col items-center mb-6 px-4">
            <div class="w-14 h-14 overflow-hidden mb-2">
                <img src="/images/logobbc.png" alt="Logo Sekolah" class="w-full h-full object-contain">
            </div>
            <span class="text-white text-center font-bold text-lg leading-tight uppercase">
                SMK BUDI BAKTI CIWIDEY
            </span>
        </div>

        <nav class="w-full px-6">
            <ul class="space-y-3 text-white font-medium">
                <li class="{{ request()->routeIs('dashboard-guru-bk') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('dashboard-guru-bk') }}" class="block w-full text-sm">Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.dataSiswa') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.dataSiswa') }}" class="block w-full text-sm">Data Siswa</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.jadwal-konseling') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.jadwal-konseling') }}" class="block w-full text-sm text-sm">Jadwal Konseling</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.pelanggaran') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.pelanggaran') }}" class="block w-full text-sm">Pelanggaran</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.tindak_lanjut') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.tindak_lanjut') }}" class="block w-full text-sm">Tindak Lanjut</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.laporan') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.laporan') }}" class="block w-full text-sm">Laporan & Export</a>
                </li>
                <li class="{{ request()->routeIs('guru-bk.backup') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                    <a href="{{ route('guru-bk.backup') }}" class="block w-full text-sm">Backup</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <div class="flex flex-col gap-6 max-w-4xl">

            <a href="{{ route('guru-bk.dataSiswa') }}"
               class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg h-28 px-6 flex items-center justify-between hover:scale-105 transition group">
                <div class="w-14">
                    <img src="/images/penggunalogo.png" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold text-black text-lg">Data Siswa</p>
                    <p class="text-sm text-black font-bold">{{ $totalSiswa ?? '0' }}</p>
                </div>
                <div class="text-3xl text-black">→</div>
            </a>

            <a href="{{ route('guru-bk.jadwal-konseling') }}"
               class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg h-28 px-6 flex items-center justify-between hover:scale-105 transition group">
                <div class="w-14">
                    <img src="/images/pesanlogo.png" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold text-black text-lg">Jadwal Konseling</p>
                    <p class="text-sm text-black font-bold">{{ $jadwalHariIni ?? '0' }}</p>
                </div>
                <div class="text-3xl text-black">→</div>
            </a>

            <a href="{{ route('guru-bk.pelanggaran') }}"
               class="bg-white/30 backdrop-blur-sm rounded-2xl shadow-lg h-28 px-6 flex items-center justify-between hover:scale-105 transition group">
                <div class="w-14">
                    <img src="/images/logoperingatan.png" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold text-black text-lg">Pelanggaran</p>
                    <p class="text-sm text-black font-bold">{{ $totalPelanggaran ?? '0' }}</p>
                </div>
                <div class="text-3xl text-black">→</div>
            </a>

        </div>
    </main>
</div> <footer class="w-full text-white/80 text-center py-4 text-[12px] mt-auto">
    © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>