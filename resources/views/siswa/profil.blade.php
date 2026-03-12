<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3 text-white">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold">Profil Saya</h1>
        <a href="{{ route('dashboard-siswa') }}" class="bg-white/20 px-4 py-1 rounded-full text-sm">Kembali</a>
    </div>
</header>

<main class="mt-32 px-6 flex justify-center">
    <div class="bg-white p-8 rounded-[2rem] shadow-xl w-full max-w-md text-center">
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-500 mx-auto mb-6">
            <img src="/images/profilelakilaki.png" class="w-full h-full object-cover" alt="Foto Profil">
        </div>

        <h3 class="text-2xl font-black text-slate-800 uppercase mb-2">{{ $siswa->nama_siswa ?? 'Nama Siswa' }}</h3>
        <p class="text-blue-600 font-bold mb-6">NISN: {{ $siswa->nisn ?? '-' }}</p>

        <div class="space-y-4 text-left border-t pt-6">
            <div>
                <label class="text-xs text-slate-400 uppercase font-bold">Jenis Kelamin</label>
                <p class="text-slate-700 font-medium">{{ $siswa->jenis_kelamin ?? '-' }}</p>
            </div>
            <div>
                <label class="text-xs text-slate-400 uppercase font-bold">Kelas</label>
                <p class="text-slate-700 font-medium">{{ $siswa->kelas ?? '-' }}</p>
            </div>
            <div>
                <label class="text-xs text-slate-400 uppercase font-bold">Alamat</label>
                <p class="text-slate-700 font-medium text-sm">{{ $siswa->alamat ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-xl font-bold hover:bg-red-600 transition">
                    LOGOUT DARI SISTEM
                </button>
            </form>
        </div>
    </div>
</main>

<footer class="fixed bottom-0 left-0 w-full text-white/80 text-center py-2 text-[10px]">
    © 2026 E-Counseling. All Rights Reserved.
</footer>

</body>
</html>