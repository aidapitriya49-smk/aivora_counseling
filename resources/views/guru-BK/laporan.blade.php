<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

</head>
<body class="bg-gray-200 font-sans">

<div class="flex min-h-screen">
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
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Guru Bk</span>
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

<!-- Judul dan tombol -->
    <div class="absolute top-28 left-12 right-6 flex flex-col z-20">
       <h2 class="text-xs font-black text-slate-700 uppercase tracking-[0.3em] mb-2">Manajemen Siswa</h2>
            <h3 class="text-2xl font-black text-slate-800 uppercase">Export Laporan</h3>
  

    
    <!-- MAIN -->
   
        @yield('content')
        <div class="p-6">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-indigo-800 mb-6">Export Laporan Pelanggaran</h2>
        
        <form action="{{ route('guru-bk.export') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                    <input type="date" name="tanggal_mulai" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                    <input type="date" name="tanggal_selesai" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="螺旋 4 12h16m-7 5l7-7-7-7" />
                </svg>
                Download Laporan PDF
            </button>
        </form>
    </div>
</div>
     <!-- Back Home -->
    <div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-guru-bk') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>
</div>

                      

    </main>
</div>

<footer class="fixed bottom-0 left-0 w-full 
               text-white/80 text-center py-2 text-[12px]">
     © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>