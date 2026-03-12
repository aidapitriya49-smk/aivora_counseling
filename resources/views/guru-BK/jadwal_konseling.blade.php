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
            <span class="text-white text-base font-medium">Guru BK</span>
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
    <div class="flex flex-col z-20 mb-6">
       <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Manajemen Konseling</h2>
       <h3 class="text-2xl font-black text-white uppercase">Jadwal Konseling Hari Ini</h3>
    </div>

    <div class=" p-8 rounded-[2.5rem] shadow-xl">
        <div class="flex justify-between items-center mb-8">
            <div class="px-4 py-2 {{ $sisaKuota > 0 ? 'bg-blue-50 text-blue-600' : 'bg-red-50 text-red-600' }} rounded-2xl text-xs font-black border border-blue-100 uppercase tracking-widest">
                Sisa Kuota Hari Ini: {{ $sisaKuota }}
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[11px] font-black text-slate-700 uppercase tracking-widest border-slate-100">
                        <th class="pb-4 px-4">Nama Siswa</th>
                        <th class="pb-4 px-4">Tanggal</th>
                        <th class="pb-4 px-4">Jenis</th>
                        <th class="pb-4 px-4">Catatan</th>
                        <th class="pb-4 px-4 text-center">Status</th>
                        <th class="pb-4 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700">
                    @foreach($jadwals as $jadwal)
                    <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 px-4 font-bold text-slate-800">{{ $jadwal->siswa->nama_siswa ?? 'N/A' }}</td>
                        <td class="py-4 px-4 text-slate-500">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</td>
                        <td class="py-4 px-4 capitalize">{{ $jadwal->jenis_konseling }}</td>
                        <td class="py-4 px-4 text-slate-500 italic">{{ Str::limit($jadwal->catatan_konseling, 20) }}</td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-3 py-1 {{ $jadwal->status == 'ya' ? 'bg-green-100 text-green-600' : 'bg-amber-100 text-amber-600' }} rounded-full text-[10px] font-black uppercase">
                                {{ $jadwal->status }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-xl text-[10px] font-black hover:bg-blue-600">DETAIL</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($jadwals->isEmpty())
        <div class="text-center py-20 border-2 border-dashed border-slate-100 rounded-[2rem] mt-6">
            <p class="text-slate-400 text-xs italic font-black uppercase tracking-widest">Belum ada jadwal konseling.</p>
        </div>
        @endif

    </div>

    <div class="flex justify-end mt-8">
            <a href="{{ route('dashboard-guru-bk') }}" class="text-gray-400 font-semibold hover:text-gray-600 transition text-sm">BACK HOME ></a>
        </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved.
</footer>

</body>
</html>