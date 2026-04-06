<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggaran - Guru BK</title>
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
    <div class="p-8 rounded-[2.5rem] shadow-sm border-white/10 bg-white/10 backdrop-blur-sm">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-xs font-black text-white/70 uppercase tracking-[0.3em] mb-2">Manajemen</h2>
                <h3 class="text-2xl font-black text-white uppercase">Data Pelanggaran</h3>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" 
                    class="bg-indigo-600 text-white px-6 py-2 rounded-2xl text-xs font-black hover:bg-indigo-700 transition shadow-lg">
                + TAMBAH PELANGGARAN
            </button>
        </div>

        <table class="w-full text-left">
            <thead>
                <tr class="text-[11px] font-black text-white uppercase tracking-widest border-b border-white/20">
                    <th class="pb-4 px-4">Nama Siswa</th>
                    <th class="pb-4 px-4">Jenis Pelanggaran</th>
                    <th class="pb-4 px-4">Kategori</th>
                    <th class="pb-4 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-white">
                @foreach($pelanggarans as $p)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="py-4 px-4 font-bold">{{ $p->siswa->name ?? 'N/A' }}</td>
                    <td class="py-4 px-4">{{ $p->jenis_pelanggaran }}</td>
                    <td class="py-4 px-4">
                        <span class="bg-amber-400 text-amber-900 px-2 py-1 rounded-lg text-[10px] font-bold">
                            {{ $p->kategori_sp ?? '-' }}
                        </span>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-8">
        <a href="{{ url('/dashboard-guru-bk') }}" class="text-white/60 font-semibold hover:text-white transition text-sm">BACK HOME ></a>
    </div>
</main>

<div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[60] flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-3xl w-full max-w-md shadow-2xl">
        <h3 class="text-xl font-black mb-6 text-slate-800">Input Pelanggaran Siswa</h3>
        <form action="{{ route('guru-bk.storePelanggaran') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Pilih Siswa</label>
                    <select name="id_siswa" class="w-full p-3 border border-slate-100 rounded-xl bg-slate-50 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach($siswas as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Jenis Pelanggaran</label>
                    <input type="text" name="jenis_pelanggaran" placeholder="Contoh: Terlambat, Atribut tidak lengkap" class="w-full p-3 border border-slate-100 rounded-xl bg-slate-50 outline-none" required>
                </div>
                <div>
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full p-3 border border-slate-100 rounded-xl bg-slate-50 outline-none" required>
                </div>
                <div>
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Sanksi / Keterangan</label>
                    <textarea name="sanksi" placeholder="Berikan keterangan sanksi..." class="w-full p-3 border border-slate-100 rounded-xl bg-slate-50 outline-none h-24" required></textarea>
                </div>
                <div>
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Kategori SP</label>
                    <select name="kategori_sp" class="w-full p-3 border border-slate-100 rounded-xl bg-slate-50 outline-none">
                        <option value="">Bukan SP</option>
                        <option value="SP1">SP 1 (Peringatan Ringan)</option>
                        <option value="SP2">SP 2 (Peringatan Sedang)</option>
                        <option value="SP3">SP 3 (Peringatan Keras)</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-8">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-slate-400 font-bold uppercase text-xs hover:text-slate-600 transition">Batal</button>
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-black text-xs hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">SIMPAN DATA</button>
            </div>
        </form>
    </div>
</div>

<footer class="fixed bottom-0 left-0 w-full text-white/50 text-center py-2 text-[10px]">
     © AIVORA 2026 E-Counseling.
</footer>

</body>
</html>