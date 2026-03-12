<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen p-10" style="background: linear-gradient(180deg, #60a5fa, #1e40af);">

<div class="max-w-md mx-auto bg-white rounded-[2.5rem] shadow-2xl overflow-hidden">
    <div class="bg-blue-600 p-6 text-center">
        <h2 class="text-white font-bold text-xl uppercase tracking-widest">Profil Konselor</h2>
    </div>

    <form action="{{ route('guru-bk.update_profil') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-xs font-bold text-center border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col items-center mb-8">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-100 shadow-md bg-gray-50">
                    <img id="preview" src="{{ asset('images/' . ($guru->foto ?? 'guru-default.png')) }}" 
                         class="w-full h-full object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name=Guru+BK&background=1e40af&color=fff'">
                </div>
                <label class="absolute bottom-0 right-0 bg-blue-600 p-2 rounded-full cursor-pointer hover:bg-blue-700 border-2 border-white transition shadow-lg">
                    <span class="text-white text-xs">📷</span>
                    <input type="file" name="foto" class="hidden" onchange="previewImage(this)">
                </label>
            </div>
        </div>

        <input type="hidden" name="foto_lama" value="{{ $guru->foto ?? '' }}">

        <div class="space-y-5">
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ $guru->nama_guru_bk ?? '' }}" class="w-full border-b-2 py-1 outline-none focus:border-blue-500 font-semibold text-slate-700">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">NIP / ID Guru</label>
                <input type="text" name="nip" value="{{ $guru->nip ?? '' }}" class="w-full border-b-2 py-1 outline-none focus:border-blue-500 font-semibold text-slate-700">
            </div>
            <div>
    <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="w-full border-b-2 py-1 outline-none focus:border-blue-500 font-semibold text-slate-700 bg-transparent">
        <option value="" disabled {{ !isset($guru->jenis_kelamin) ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
        <option value="Laki-laki" {{ ($guru->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ ($guru->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl mt-8 shadow-lg hover:bg-blue-700 active:scale-95 transition-all uppercase tracking-widest text-sm">
            Simpan Profil
        </button>
        
       <form action="{{ route('guru-bk.update_profil') }}" method="POST" enctype="multipart/form-data">
    @csrf
    </form>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) { document.getElementById('preview').src = e.target.result; }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>