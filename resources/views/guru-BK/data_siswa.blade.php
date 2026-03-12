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
            <h3 class="text-2xl font-black text-slate-800 uppercase">Data Identitas Siswa</h3>
  

    
    <!-- MAIN -->
   
        @yield('content')
        <div class=" p-8 rounded-[2.5rem] shadow-sm ">
    <div class="flex justify-between items-center mb-8">
        <div>
           
        </div>
        <div class="px-4 py-2 bg-blue-50 text-blue-600 rounded-2xl text-xs font-black border border-blue-100 uppercase tracking-widest">
            Total Siswa: {{ $siswas->count() }}
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-[11px] font-black text-slate-700 uppercase tracking-widest border-b border-slate-100">
                    <th class="pb-4 px-4">Nama Lengkap</th>
                    <th class="pb-4 px-4">NISN</th>
                    <th class="pb-4 px-4">Tempat, Tgl Lahir</th>
                    <th class="pb-4 px-4">Alamat</th>
                    <th class="pb-4 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700">
                @foreach($siswas as $siswa)
                <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 px-4 font-bold text-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-black text-slate-500 uppercase">
                                {{ substr($siswa->name, 0, 1) }}
                            </div>
                            {{ $siswa->name }}
                        </div>
                    </td>
                    <td class="py-4 px-4 text-slate-500 font-medium">{{ $siswa->nisn ?? '-' }}</td>
                   <td class="py-4 px-4 text-slate-500">{{ $siswa->tempat_tanggal_lahir ?? '-' }}</td>
                    <td class="py-4 px-4 text-slate-500">{{ $siswa->alamat ?? '-' }}</td>
                    <td class="py-4 px-4">
                        <div class="flex justify-center gap-2">
                            <button title="Riwayat Pelanggaran" class="bg-amber-500 text-white p-2 rounded-xl hover:bg-amber-600 transition shadow-sm shadow-amber-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </button>
                            <button title="Kirim Surat" class="bg-emerald-500 text-white p-2 rounded-xl hover:bg-emerald-600 transition shadow-sm shadow-emerald-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </button>
                            <a href="{{ route('guru-bk.detail_siswa', $siswa->id) }}" 
   class="bg-blue-500 text-white px-3 py-2 rounded-xl text-[10px] font-black uppercase hover:bg-blue-600 transition shadow-sm">
    Detail
</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($siswas->isEmpty())
    <div class="text-center py-20 border-2 border-dashed border-slate-100 rounded-[2rem] mt-6">
        <p class="text-slate-400 text-xs italic font-black uppercase tracking-widest">Belum ada data siswa terdaftar.</p>
    </div>
    @endif

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
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>