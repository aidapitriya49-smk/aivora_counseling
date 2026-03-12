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

<div class="p-10 rounded-[3rem] backdrop-blur-md bg-white/10 border border-white/20 shadow-lg">
    
    <div class="mb-10">
        <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Analisis Data</h2>
        <h3 class="text-2xl font-black text-white">STATISTIK KONSELING</h3>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Grafik Konseling -->
        <div class="lg:col-span-2 p-8 rounded-[2.5rem] bg-white/10 border border-white/20">
            
            <h4 class="font-black text-white mb-8 uppercase text-[11px] tracking-[0.2em]">
                Perbandingan Data Konseling
            </h4>

            <div class="flex items-end justify-around h-64 px-4 gap-4">

                @foreach($dataGrafik as $label => $nilai)
                <div class="flex flex-col items-center w-full">

                    <span class="text-xs font-black text-white/80 mb-2">
                        {{ $nilai }}
                    </span>

                    <div class="w-full max-w-[60px] bg-indigo-400 rounded-t-2xl transition-all duration-500 hover:bg-indigo-500 shadow-lg"
                         style="height: {{ $totalKonseling > 0 ? ($nilai / $totalKonseling) * 100 : 0 }}%; min-height:20px;">
                    </div>

                    <span class="text-[10px] font-bold text-white/70 mt-4 uppercase tracking-tighter">
                        {{ $label }}
                    </span>

                </div>
                @endforeach

            </div>
        </div>

        <!-- Distribusi Konseling -->
        <div class="p-8 rounded-[2.5rem] bg-white/10 border border-white/20 flex flex-col justify-center">
            
            <h4 class="font-black text-white mb-6 uppercase text-[11px] tracking-[0.2em]">
                Distribusi Konseling
            </h4>

            <div class="space-y-6">

                @foreach($dataGrafik as $label => $nilai)
                <div>

                    <div class="flex justify-between mb-2">
                        <span class="text-xs font-bold text-white/70">{{ $label }}</span>
                        <span class="text-xs font-black text-white">
                            {{ $totalKonseling > 0 ? round(($nilai/$totalKonseling)*100) : 0 }}%
                        </span>
                    </div>

                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-indigo-400 h-2 rounded-full"
                             style="width: {{ $totalKonseling > 0 ? ($nilai/$totalKonseling)*100 : 0 }}%">
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

            <div class="mt-8 pt-6 border-t border-white/20">
                <p class="text-[10px] text-white/60 italic leading-relaxed">
                    *Statistik ini berdasarkan data aktivitas konseling siswa di sistem.
                </p>
            </div>

        </div>

    </div>
</div>

<!-- BACK HOME -->
<div class="flex justify-end mt-6 mr-20">
    <a href="{{ route('dashboard-admin') }}" 
       class="text-white/70 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-white transition text-sm">
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