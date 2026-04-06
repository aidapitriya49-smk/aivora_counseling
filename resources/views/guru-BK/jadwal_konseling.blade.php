<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konseling - Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Memastikan area klik tidak terhalang */
        .action-button {
            isolation: isolate;
            cursor: pointer !important;
            pointer-events: auto !important;
        }
        tr:hover {
            z-index: 50;
        }
    </style>
</head>
<body class="font-sans min-h-screen flex flex-col relative" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d); background-attachment: fixed;">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-[100] px-8 py-3">
    <div class="flex items-center">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover" alt="Profile">
            </div>
            <span class="text-white text-base font-medium">Guru BK</span>
        </div>
        <div class="flex items-center gap-3 ml-auto">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition cursor-pointer relative z-[110]">Logout</button>
            </form>
        </div>
    </div>
</header>

<main class="mt-32 px-12 pb-20 relative z-10">
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500 text-white rounded-2xl shadow-lg flex items-center gap-3 animate-bounce">
            <b>Berhasil!</b> {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col mb-6">
       <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Manajemen Konseling</h2>
       <h3 class="text-2xl font-black text-white uppercase">Jadwal Konseling Hari Ini</h3>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl relative overflow-hidden">
        <div class="flex justify-between items-center mb-8">
            <div class="px-4 py-2 {{ $sisaKuota > 0 ? 'bg-blue-50 text-blue-600' : 'bg-red-50 text-red-600' }} rounded-2xl text-xs font-black border border-blue-100 uppercase tracking-widest">
                Sisa Kuota Hari Ini: {{ $sisaKuota }}
            </div>
        </div>

        <div class="overflow-x-auto relative shadow-sm rounded-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[11px] font-black text-slate-700 uppercase tracking-widest border-b border-slate-100 bg-slate-50/50">
                        <th class="py-4 px-4">Nama Siswa</th>
                        <th class="py-4 px-4">Tanggal (Edit)</th>
                        <th class="py-4 px-4">Jenis</th>
                        <th class="py-4 px-4">Catatan</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700">
                    @foreach($jadwals as $jadwal)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                       
<td class="py-4 px-4 font-bold text-slate-800">
    {{ $jadwal->siswa->nama_siswa ?? $jadwal->siswa->name ?? 'N/A' }}
</td>

                        <td class="py-4 px-4">
                            <form action="{{ route('guru-bk.update-tanggal', $jadwal->id_konseling) }}" method="POST" class="flex items-center gap-2 relative z-20">
                                @csrf
                                @method('PATCH')
                                <input type="date" name="tanggal" value="{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') }}" class="bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs focus:ring-2 focus:ring-blue-400 outline-none cursor-pointer">
                                <button type="submit" class="text-blue-500 p-1 hover:bg-blue-50 rounded cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                                </button>
                            </form>
                        </td>

                        <td class="py-4 px-4 font-semibold text-slate-600 capitalize">{{ $jadwal->jenis_konseling }}</td>
                        <td class="py-4 px-4 text-slate-500 italic">{{ Str::limit($jadwal->catatan_konseling, 20) }}</td>
                        
                        <td class="py-4 px-4 text-center">
                            @if($jadwal->status == 'pending')
                                <span class="px-3 py-1 bg-amber-100 text-amber-600 rounded-full text-[10px] font-black uppercase tracking-wider">Menunggu</span>
                            @elseif($jadwal->status == 'ya')
                                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-black uppercase tracking-wider">Diterima</span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-[10px] font-black uppercase tracking-wider">Ditolak</span>
                            @endif
                        </td>

                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center gap-3">
                                @if($jadwal->status == 'pending')
                                    {{-- FORM SETUJU --}}
                                    <form action="{{ route('guru-bk.update-status', $jadwal->id_konseling) }}" method="POST" class="m-0 p-0 inline-block relative z-50">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="ya">
                                        <button type="submit" class="action-button bg-green-500 hover:bg-green-600 text-white w-9 h-9 flex items-center justify-center rounded-xl shadow-md transition-transform active:scale-95" title="Setujui">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </form>

                                    {{-- FORM TOLAK --}}
                                    <form action="{{ route('guru-bk.update-status', $jadwal->id_konseling) }}" method="POST" class="m-0 p-0 inline-block relative z-50">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="tidak">
                                        <button type="submit" class="action-button bg-red-500 hover:bg-red-600 text-white w-9 h-9 flex items-center justify-center rounded-xl shadow-md transition-transform active:scale-95" title="Tolak">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    {{-- TOMBOL HAPUS --}}
                                    <form action="{{ route('guru-bk.delete-konseling', $jadwal->id_konseling) }}" method="POST" class="m-0 p-0 inline-block relative z-50" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button bg-rose-500 hover:bg-rose-600 text-white w-9 h-9 flex items-center justify-center rounded-xl shadow-md transition-transform active:scale-95">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                
                                {{-- TOMBOL DETAIL --}}
                                <a href="{{ route('guru-bk.detail_siswa', $jadwal->siswa->id ?? 0) }}" class="bg-blue-500 hover:bg-blue-600 text-white w-9 h-9 flex items-center justify-center rounded-xl shadow-md relative z-50 transition-transform active:scale-95" title="Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </div>
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
        <a href="{{ route('dashboard-guru-bk') }}" class="text-gray-400 font-semibold hover:text-gray-600 transition text-sm relative z-[60]">BACK HOME ></a>
    </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px] z-0 pointer-events-none">
     © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>