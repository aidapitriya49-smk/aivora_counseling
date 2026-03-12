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

    <div class="mb-6 p-4 rounded-xl {{ $sisaKuota > 0 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
        <p class="font-bold">Sisa Kuota Hari Ini: {{ $sisaKuota }} / 5</p>
    </div>

    @if($sisaKuota > 0)
        <form action="{{ route('siswa.simpan_jadwal') }}" method="POST">
    @csrf
    
    <div class="mb-4">
        <label>Ceritakan Masalah</label>
        <textarea name="catatan_konseling" class="w-full p-4 border rounded-xl" required></textarea>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl">Kirim Pengajuan</button>
</form>
    @else
        <button disabled class="w-full bg-slate-300 text-white py-4 rounded-xl font-bold cursor-not-allowed">
            Kuota Penuh (0 Tersisa)
        </button>
        <p class="text-red-500 mt-2 text-sm italic text-center">*Maaf, tidak bisa mendaftar karena kuota sudah penuh.</p>
    @endif
  </div>

  <div class="flex justify-center mt-8">
      <a href="{{ route('dashboard-siswa') }}" class="text-white/70 font-semibold hover:text-white transition text-sm underline">BACK HOME</a>
  </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved.
</footer>

</body>
</html>