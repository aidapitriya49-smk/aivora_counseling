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

<!-- NAVBAR -->
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
            <span class="text-white text-base font-medium">Admin</span>
        </div>

        <!-- KANAN -->
        <div class="flex items-center gap-3 ml-auto">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <button class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                Logout
            </button>
        </div>

    </div>
</header>

<!-- CONTENT -->
<main class="flex-1 pt-28 px-8 text-white">

   <div class=" p-10 rounded-[3rem] shadow-sm ">
            <div class="mb-10">
                <h2 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-2">Log Sistem</h2>
                <h3 class="text-2xl font-black text-slate-800">AKTIVITAS TERBARU</h3>
            </div>

            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-slate-100"></div>

                <div class="space-y-8 relative">
                    @foreach($recentUsers as $user)
                    <div class="flex items-center gap-6 group">
                        <div class="w-8 h-8 rounded-full bg-white border-4 border-blue-500 z-10 flex-shrink-0 transition-transform group-hover:scale-125"></div>
                        
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100 flex-1 flex justify-between items-center hover:bg-white hover:shadow-md transition-all">
                            <div>
                                <p class="text-sm font-black text-slate-800 uppercase tracking-tight">
                                    Pengguna Baru Terdaftar
                                </p>
                                <p class="text-xs text-slate-500 mt-1">
                                    <span class="font-bold text-blue-600">{{ $user->name }}</span> bergabung sebagai <span class="capitalize">{{ $user->role }}</span>
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex items-center gap-6 group">
                        <div class="w-8 h-8 rounded-full bg-white border-4 border-green-500 z-10 flex-shrink-0"></div>
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100 flex-1 flex justify-between items-center italic">
                            <div>
                                <p class="text-sm font-black text-slate-400 uppercase tracking-tight">Sistem Online</p>
                                <p class="text-xs text-slate-400 mt-1">Database sinkronisasi berhasil dilakukan.</p>
                            </div>
                            <span class="text-[10px] font-bold text-slate-300 uppercase">Baru Saja</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 p-6 bg-blue-50/50 rounded-3xl border border-blue-100 flex items-center gap-4">
                <div class="text-2xl">🛡️</div>
                <p class="text-[11px] text-blue-800 font-medium leading-relaxed">
                    Halaman ini mencatat pendaftaran akun dan perubahan status sistem secara otomatis. Pastikan untuk memeriksa log ini secara berkala untuk menjaga keamanan data.
                </p>
            </div>
        </div>
    
    <!-- BACK HOME -->
    <div class="flex justify-end mt-4 mr-20">
    <a href="{{ route('dashboard-admin') }}" 
       class="font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
</div>

</main>

<!-- FOOTER -->
<footer class="w-full text-white/80 text-center py-3 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>