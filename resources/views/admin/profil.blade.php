<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-slate-800" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<div class="max-w-md mx-auto bg-white p-8 rounded-[2rem] shadow-2xl mt-20">
    <h2 class="text-2xl font-black mb-6 text-center text-purple-700">PENGATURAN PROFIL</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-4 text-center text-sm font-bold">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.update_profil') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="flex flex-col items-center mb-8">
        <div class="relative group">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-purple-500 shadow-lg bg-gray-200">
                <img id="previewFoto" 
                     src="{{ asset('images/' . ($admin->foto ?? 'admin-default.png')) }}" 
                     class="w-full h-full object-cover"
                     onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=7754f4&color=fff'">
            </div>
            
            <label for="inputFoto" class="absolute bottom-1 right-1 bg-purple-600 p-2 rounded-full cursor-pointer border-2 border-white hover:bg-purple-700 transition shadow-md">
                <span class="text-white text-xs">📷</span>
                <input type="file" name="foto" id="inputFoto" class="hidden" accept="image/*" onchange="previewImage(this)">
            </label>
        </div>
        <p class="text-[10px] text-slate-400 mt-3 font-bold uppercase tracking-widest">Klik icon kamera untuk ganti foto</p>
    </div>

    <div class="space-y-4">
        <div>
            <label class="text-[10px] font-black uppercase text-slate-400">Nama Lengkap</label>
            <input type="text" name="name" value="{{ $admin->name }}" class="w-full border-b-2 p-2 outline-none focus:border-purple-500 transition">
        </div>
        <div>
            <label class="text-[10px] font-black uppercase text-slate-400">Email</label>
            <input type="email" name="email" value="{{ $admin->email }}" class="w-full border-b-2 p-2 outline-none focus:border-purple-500 transition">
        </div>
        
        <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-xl mt-6 shadow-lg hover:shadow-purple-500/50 transition duration-300">
            UPDATE PROFIL
        </button>
    </div>
</form>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewFoto').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</div>

<div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-admin') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>

</body>
</html>