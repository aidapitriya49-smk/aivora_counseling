<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Identitas Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
    <div class="flex items-center">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Guru Bk</span>
        </div>
        <div class="flex items-center gap-3 ml-auto">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">Logout</button>
            </form>
        </div>
    </div>
</header>

<main class="flex-grow pt-28 pb-12 px-12">
    <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-xl p-10 rounded-[3rem] border border-white/20 shadow-2xl text-white">
        <h2 class="text-2xl font-black uppercase mb-8 tracking-tighter">Edit Identitas Siswa</h2>
        
        <form action="{{ route('guru-bk.update_siswa', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <div>
                    <label class="text-[12px] font-black uppercase tracking-widest ml-2 opacity-70">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $siswa->name }}" required
                           class="w-full bg-white/5 border border-white/20 rounded-2xl p-4 mt-1 outline-none focus:border-blue-400 transition-all font-semibold text-white">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[12px] font-black uppercase tracking-widest ml-2 opacity-70">NISN</label>
                        <input type="text" name="nisn" value="{{ $siswa->nisn }}" placeholder="Masukkan NISN"
                               class="w-full bg-white/5 border border-white/20 rounded-2xl p-4 mt-1 outline-none focus:border-blue-400 transition-all font-semibold text-white">
                    </div>
                    <div>
                        <label class="text-[12px] font-black uppercase tracking-widest ml-2 opacity-70">Tempat, Tanggal Lahir</label>
                        <input type="text" name="tempat_tanggal_lahir" value="{{ $siswa->tempat_tanggal_lahir }}" placeholder="Contoh: Jakarta, 12-05-2007"
                               class="w-full bg-white/5 border border-white/20 rounded-2xl p-4 mt-1 outline-none focus:border-blue-400 transition-all font-semibold text-white">
                    </div>
                </div>

                <div>
                    <label class="text-[11px] font-black uppercase tracking-widest ml-2 opacity-70">Alamat</label>
                    <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap..."
                              class="w-full bg-white/5 border border-white/20 rounded-2xl p-4 mt-1 outline-none focus:border-blue-400 transition-all font-semibold text-white">{{ $siswa->alamat }}</textarea>
                </div>

               <div>
    <label class="text-[11px] font-black uppercase tracking-widest ml-2 opacity-70">Email</label>
    <input type="email" name="email" value="{{ $siswa->email }}" required
           class="w-full bg-white/5 border {{ $errors->has('email') ? 'border-red-500' : 'border-white/20' }} rounded-2xl p-4 mt-1 outline-none focus:border-blue-400 transition-all font-semibold text-white">
    @error('email')
        <p class="text-red-400 text-xs mt-1 ml-2 font-medium">{{ $message }}</p>
    @enderror
</div>
            </div>

            <button type="submit" class="w-full mt-8 bg-blue-600 hover:bg-blue-500 p-4 rounded-2xl font-black uppercase tracking-widest transition-all shadow-lg active:scale-95">
                Simpan Perubahan
            </button>
        </form>

        <form action="{{ route('guru-bk.delete_siswa', $siswa->id) }}" method="POST" id="form-hapus" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="button" onclick="tanyaHapus()" class="w-full bg-red-600 hover:bg-red-500 p-4 rounded-2xl font-black uppercase tracking-widest transition-all shadow-lg active:scale-95">
                Hapus Siswa
            </button>
        </form>
    </div>

    <div class="flex justify-end mt-8">
        <a href="{{ route('guru-bk.dataSiswa') }}" class="font-semibold text-gray-300 hover:text-white transition text-sm tracking-widest uppercase">
            < KEMBALI KE DATA SISWA
        </a>
    </div>
</main>

<script>
    function tanyaHapus() {
        if (confirm("Anda yakin ingin menghapus ini? Data yang dihapus tidak bisa dikembalikan.")) {
            document.getElementById('form-hapus').submit();
        }
    }
</script>

</body>
</html>