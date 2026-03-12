<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Konseling - E-Counseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-white/30 flex items-center justify-center font-bold text-white">S</div>
            <span class="text-white font-medium">Siswa</span>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">Logout</button>
        </form>
    </div>
</header>

<main class="flex-grow flex items-center justify-center px-6 py-24">
    <div class="w-full max-w-lg bg-white p-8 rounded-[2rem] shadow-2xl">
        <h3 class="text-2xl font-black text-slate-800 uppercase mb-6 text-center">Form Ajukan Konseling</h3>
        
        <form action="{{ route('siswa.simpan_pengajuan') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label class="block text-sm font-bold text-slate-600 mb-2">Pilih Guru BK</label>
                <select name="id_guru_bk" class="w-full p-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" required>
                    <option value="">-- Pilih Guru --</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id_guru_bk }}">{{ $guru->nama_guru_bk }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-600 mb-2">Ceritakan Masalah Kamu</label>
                <textarea name="catatan_konseling" class="w-full p-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" rows="5" placeholder="Tuliskan masalah singkat di sini..." required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-xl font-black uppercase hover:bg-blue-700 transition transform hover:scale-[1.02]">
                Kirim Pengajuan
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('dashboard-siswa') }}" class="text-slate-400 hover:text-blue-600 transition text-sm font-semibold italic">Kembali ke Dashboard</a>
        </div>
    </div>
</main>

<footer class="py-4 text-white/60 text-center text-xs">
    © 2026 E-Counseling. All Rights Reserved.
</footer>

</body>
</html>