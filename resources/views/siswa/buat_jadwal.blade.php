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
  <div class="bg-white p-8 rounded-[2rem] shadow-xl max-w-lg mx-auto">
    <h3 class="text-2xl font-black text-slate-800 uppercase mb-6">Buat Jadwal Konseling</h3>

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 text-red-600 rounded-xl border border-red-200">
            <p class="font-bold text-sm">⚠️ {{ session('error') }}</p>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-600 rounded-xl border border-green-200">
            <p class="font-bold text-sm">✅ {{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('siswa.simpan_jadwal') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Guru BK</label>
            <select name="id_guru_bk" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($gurus as $g)
                    <option value="{{ $g->id_guru_bk }}">{{ $g->nama_guru_bk }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Konseling</label>
            <input type="date" name="tanggal" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" min="{{ date('Y-m-d') }}" required>
            <p class="text-[10px] text-slate-400 mt-1">*Maksimal 5 siswa per hari</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-700 mb-2">Metode Konseling</label>
            <div class="flex gap-6 p-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="tipe_konseling" value="offline" checked> Offline
                </label>
                <label class="flex items-center gap-2 cursor-pointer text-green-600 font-semibold">
                    <input type="radio" name="tipe_konseling" value="online"> Online 
                </label>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-slate-700 mb-2">Ceritakan Masalah</label>
            <textarea name="catatan_konseling" class="w-full p-4 border rounded-xl h-32 focus:ring-2 focus:ring-blue-500 outline-none" required placeholder="Jelaskan masalah Anda..."></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-lg transform active:scale-95">
            Kirim Pengajuan
        </button>
    </form>
  </div>

  <div class="flex justify-end mt-8">
            <a href="{{ route('dashboard-siswa') }}" class="text-gray-400 font-semibold hover:text-gray-600 transition text-sm">BACK HOME ></a>
        </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px]">
     © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>
</body>
</html>