<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen p-10" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<div class="max-w-md mx-auto bg-white rounded-[2.5rem] shadow-2xl overflow-hidden">
    <div class="bg-purple-600 p-6 text-center">
        <h2 class="text-white font-bold text-xl uppercase tracking-widest">Pengaturan Profil</h2>
    </div>

    <form action="{{ route('admin.update_profil') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-xs font-bold text-center border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col items-center mb-8">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-purple-100 shadow-md bg-gray-50">
                    <img id="preview" src="{{ asset('images/' . ($admin->foto ?? 'admin-default.png')) }}" 
                         class="w-full h-full object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=7754f4&color=fff'">
                </div>
                <label class="absolute bottom-0 right-0 bg-purple-600 p-2 rounded-full cursor-pointer hover:bg-purple-700 border-2 border-white transition shadow-lg">
                    <span class="text-white text-xs">📷</span>
                    <input type="file" name="foto" class="hidden" onchange="previewImage(this)">
                </label>
            </div>
            <p class="text-[10px] text-slate-400 mt-3 font-bold uppercase tracking-widest">Klik ikon kamera untuk ganti foto</p>
        </div>

        <div class="space-y-5">
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $admin->name ?? '' }}" class="w-full border-b-2 py-1 outline-none focus:border-purple-500 font-semibold text-slate-700 transition">
            </div>
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Email Admin</label>
                <input type="email" name="email" value="{{ $admin->email ?? '' }}" class="w-full border-b-2 py-1 outline-none focus:border-purple-500 font-semibold text-slate-700 transition">
            </div>
            
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border-b-2 py-1 outline-none focus:border-purple-500 font-semibold text-slate-700 bg-transparent">
                    <option value="" disabled {{ !isset($admin->jenis_kelamin) ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ ($admin->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ ($admin->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>

        <button type="submit" class="w-full bg-purple-600 text-white font-black py-4 rounded-2xl mt-8 shadow-lg hover:bg-purple-700 active:scale-95 transition-all uppercase tracking-widest text-sm">
            Simpan Profil Admin
        </button>
    </form>
</div>

<div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-admin') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) { 
                document.getElementById('preview').src = e.target.result; 
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>