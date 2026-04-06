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
   <div class="p-8 text-white">
    <h2 class="text-2xl font-bold mb-4">Riwayat Pelanggaran: {{ $siswa->name }}</h2>
    <div class="bg-white/10 p-6 rounded-3xl">
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th class="pb-3">Jenis Pelanggaran</th>
                    <th class="pb-3">Poin</th>
                    <th class="pb-3">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggarans as $p)
                <tr class="border-t border-white/10">
                    <td class="py-3">{{ $p->nama_pelanggaran }}</td>
                    <td class="py-3 text-red-400 font-bold">{{ $p->poin }}</td>
                    <td class="py-3">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 text-right font-black">TOTAL POIN: {{ $pelanggarans->sum('poin') }}</div>
    </div>
</div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px]">
     © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>