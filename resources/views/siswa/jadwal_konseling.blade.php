<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konseling - Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
    <div class="flex items-center">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Siswa</span>
        </div>
        <div class="flex items-center gap-3 ml-auto">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">Logout</button>
            </form>
        </div>
    </div>
</header>

<main class="mt-32 px-12 pb-20">
  <div class="mt-32 px-12 pb-20">
    <div class="flex flex-col mb-8">
        <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Konseling</h2>
        <h3 class="text-2xl font-black text-white uppercase">Jadwal Konseling Saya</h3>
    </div>

    <div class=" p-8 rounded-[2.5rem] shadow-xl">
        <table class="w-full text-left">
            <thead>
                <tr class="text-[11px] font-black text-slate-700 uppercase tracking-widest border-b border-slate-100">
                    <th class="pb-4 px-4">Tanggal</th>
                    <th class="pb-4 px-4">Guru BK</th>
                    <th class="pb-4 px-4">Jenis</th>
                    <th class="pb-4 px-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700">
                @foreach($jadwals as $jadwal)
                <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                    <td class="py-4 px-4 font-bold">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</td>
                    <td class="py-4 px-4 text-slate-600">{{ $jadwal->guru->nama_guru ?? 'Belum Ditentukan' }}</td>
                    <td class="py-4 px-4 capitalize">{{ $jadwal->jenis_konseling }}</td>
                    <td class="py-4 px-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase 
                            {{ $jadwal->status == 'ya' ? 'bg-green-100 text-green-600' : 'bg-amber-100 text-amber-600' }}">
                            {{ $jadwal->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($jadwals->isEmpty())
        <div class="text-center py-10">
            <p class="text-slate-400 italic">Belum ada jadwal konseling yang diajukan.</p>
        </div>
        @endif
    </div>
</div>
  
    <div class="flex justify-end mt-8">
            <a href="{{ route('dashboard-siswa') }}" class="text-gray-400 font-semibold hover:text-gray-600 transition text-sm">BACK HOME ></a>
        </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved.
</footer>

</body>
</html>