<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col font-sans"
      style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
    <div class="flex items-center">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50 bg-white/10">
                <img src="{{ asset('images/' . ($admin->foto ?? 'profilelakilaki.png')) }}" 
                     class="w-full h-full object-cover"
                     onerror="this.src='{{ asset('images/profilelakilaki.png') }}'">
            </div>
            <span class="text-white text-base font-medium">{{ $admin->name ?? 'Admin' }}</span>
        </div>

        <div class="flex items-center gap-3 ml-auto">
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

<main class="flex-1 pt-28 px-8 text-white relative">
    <div class="text-center mb-10">
        <p class="text-white/70 tracking-[4px] text-sm uppercase">Ringkasan Sistem</p>
        <h1 class="text-3xl font-bold mt-2">DATA MASTER</h1>
    </div>

    <div class="max-w-4xl mx-auto bg-white/30 backdrop-blur-md rounded-3xl shadow-2xl p-10 relative overflow-hidden">
        
        <div class="absolute inset-0 flex justify-center items-center opacity-10 pointer-events-none">
            <img src="/images/masterlogo.png" class="w-2/3 object-contain">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 relative z-10">

                      <a href="{{ route('admin.dataPengguna') }}" 
              class="rounded-2xl p-6 text-center shadow-md border border-white cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:brightness-110 block"
              style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">
                
                <div class="flex justify-center mb-1"> 
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="/images/logopengguna.png" class="w-10 h-10 object-contain">
                    </div>
                </div>

                <p class="text-gray-500 text-[10px] -mt-2 uppercase font-bold tracking-tighter">Total Pengguna</p>
                
                <p class="text-gray-700 font-black text-xl">{{ $totalUser }}</p>
            </a>

                        <a href="{{ route('guru-bk.dataSiswa') }}" 
              class="rounded-2xl p-6 text-center shadow-md border border-white cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:brightness-110 block group"
              style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">
                
                <div class="flex justify-center mb-2">
                    <div class="w-12 h-12 flex items-center justify-center transition-transform ">
                        <img src="/images/datasiswa.png" class="w-12 h-12 object-contain">
                    </div>
                </div>

                <p class="text-gray-500 text-[10px] -mt-3 uppercase font-bold tracking-tighter">Data Siswa</p>
                <p class="text-gray-700 font-black text-xl">{{ $totalSiswa }}</p>
            </a>

            <a href="{{ route('admin.statistikSistem') }}" 
               class="rounded-2xl p-6 text-center shadow-md border border-white cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:brightness-110 block group"
               style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">
                
                <div class="flex justify-center mb-2">
                    <div class="w-12 h-12 flex items-center justify-center transition-transform ">
                        <img src="/images/totalkonseling.png" class="w-10 h-10 object-contain">
                    </div>
                </div>

                <p class="text-gray-500 text-[10px] -mt-3 uppercase font-bold tracking-tighter">Total Konseling</p>
                <p class="text-gray-700 font-black text-xl">{{ $totalKonseling }}</p>
            </a>

                          <a href="{{ route('guru-bk.pelanggaran') }}" 
                class="rounded-2xl p-6 text-center shadow-md border border-white cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-xl hover:brightness-110 block"
                style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">
                
                <div class="flex justify-center mb-2">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="/images/logoperingatan.png" class="w-10 h-10 object-contain">
                    </div>
                </div>

                <p class="text-gray-500 text-[10px] -mt-3 uppercase font-bold tracking-tighter">Pelanggaran</p>
                <p class="text-gray-700 font-black text-xl">{{ $totalPelanggaran ?? '0' }}</p>
            </a>

        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-md flex justify-between items-center relative z-10">
            <p class="text-sm">
                <span class="text-blue-600 font-semibold uppercase tracking-wider">Status:</span>
                <span class="text-green-600 font-bold ml-1 animate-pulse italic">Database Aktif</span>
            </p>
            <p class="text-gray-500 text-[10px] font-bold">
                Update: {{ date('d M Y') }}
            </p>
        </div>
    </div>

    <div class="flex justify-end mt-6 max-w-4xl mx-auto">
        <a href="{{ route('admin.informasiRingkas') }}" 
           class="font-semibold text-white/70 hover:text-white transition-all flex items-center gap-2 group text-sm uppercase tracking-widest">
            <span>BACK HOME</span>
            <span class="group-hover:translate-x-1 transition-transform inline-block">></span>
        </a>
    </div>
</main>

<footer class="w-full text-white/80 text-center py-6 text-[10px] mt-auto">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>