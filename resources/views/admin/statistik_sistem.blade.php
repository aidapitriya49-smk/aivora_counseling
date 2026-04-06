<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Konseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col font-sans" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">
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
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>

<main class="flex-1 pt-28 px-8 text-white">
<div class="p-10 rounded-[3rem] backdrop-blur-md bg-white/10 border border-white/20 shadow-lg">
    <div class="mb-10">
        <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Analisis Data</h2>
        <h3 class="text-2xl font-black text-white">STATISTIK KONSELING</h3>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        <div class="lg:col-span-3 p-8 rounded-[3.5rem] bg-white/10 border border-white/20">
            <h4 class="font-black text-white mb-8 uppercase text-[11px] tracking-[0.2em]">
                Perbandingan Data Konseling
            </h4>
           <div class="flex items-end justify-around h-64 px-4 gap-4 border-b border-white/20">
    @foreach($dataGrafik as $label => $nilai)
    <div class="flex flex-col items-center w-full h-full justify-end">
        {{-- Angka di atas diagram (Misal: 27) --}}
        <span class="text-xs font-black text-white/80 mb-2">
            {{ $nilai }}
        </span>

        {{-- Tinggi batang menyesuaikan nilai --}}
        {{-- Jika nilai 27, maka height otomatis 27%. Jika nilai 100, height 100% --}}
        <div class="w-full max-w-[60px] bg-indigo-400 rounded-t-2xl transition-all duration-700 hover:bg-indigo-300 shadow-lg"
             style="height: {{ min($nilai, 100) }}%; min-height:10px;">
        </div>

        <span class="text-[10px] font-bold text-white/70 mt-4 uppercase tracking-tighter">
            {{ $label }}
        </span>
    </div>
    @endforeach
</div>
        </div>
    </div>
</div>

<div class="flex justify-end mt-6 mr-20">
    <a href="{{ route('admin.informasiRingkas') }}" 
       class="text-white/70 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-white transition text-sm">
        BACK HOME >
    </a>
</div>
</main>

<footer class="w-full text-white/80 text-center py-3 text-[12px]">
    © AIVORA 2026 E-Counseling. All Rights Reserved.
</footer>
</body>
</html>