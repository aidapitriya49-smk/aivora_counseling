<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi guru</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 font-sans">

<div class="flex min-h-screen">
      <body class="font-sans min-h-screen flex flex-col"
style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<!-- NAVBAR (FIXED & TRANSPARAN) -->
<header class="fixed top-0 left-0 w-full 
               bg-white/20 backdrop-blur-md 
               border-b border-white/20 
               shadow-md z-50 px-8 py-3">

    <div class="flex items-center">

        <!-- KIRI -->
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50">
                <img src="/images/profilelakilaki.png" class="w-full h-full object-cover">
            </div>
            <span class="text-white text-base font-medium">Admin</span>
        </div>

        <!-- KANAN -->
        <div class="flex items-center gap-3 ml-auto">
            <span class="text-xl cursor-pointer text-white">🔔</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>

    </div>
</header>

<!-- Judul dan tombol -->
    <div class="absolute top-28 left-12 right-6 flex flex-col z-20">
    <h2 class="text-white text-3xl md:text-3xl font-bold tracking-wide">
        Daftar Data Pengguna
    </h2>
    <p class="text-white/80 text-sm mt-1">
        Memantau semua akun yang terdaftar (Admin, Guru, dan Siswa)
    </p>

    <div class="mt-4">
        <a href="{{ route('admin.registrasiGuru') }}" 
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-xl shadow-lg transition-all transform hover:scale-105 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 4v16m8-8H4" />
            </svg>
            Tambah Data Guru
        </a>
</div>

<!-- KOTAK DATA -->
<div class="overflow-x-auto pb-24">
            <table class="w-full text-white text-sm border-separate border-spacing-y-3">

        <thead>
    <tr>
        <th class="text-left px-6 py-3 border-b border-white/40">Nama</th>
        <th class="text-left px-6 py-3 border-b border-white/40">Email</th>
        <th class="text-left px-6 py-3 border-b border-white/40">Role</th>
        <th class="text-left px-6 py-3 border-b border-white/40">Aksi</th>
    </tr>
</thead>

    
<tbody>
@foreach($users as $user)
<tr class="bg-white/20">

    <td class="px-6 py-3 rounded-l-full">{{ $user->name }}</td>
    <td class="px-6 py-3">{{ $user->email }}</td>
    <td class="px-6 py-3">{{ $user->role }}</td>
    <td class="px-6 py-3 rounded-r-full flex gap-2">

      <!-- EDIT -->
        <a href="{{ route('admin.editUser', $user->id) }}"
           class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
           Edit
        </a>

        <!-- DELETE -->
        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                Delete
            </button>
        </form>

    </td>

</tr>
@endforeach
</tbody>

@if(session('success'))
<div id="successAlert"
     class="bg-green-500 text-white p-3 rounded mb-4 transition-opacity duration-500">
    {{ session('success') }}
</div>

<script>
    setTimeout(function() {
        const alert = document.getElementById('successAlert');
        if(alert){
            alert.style.opacity = "0";
            setTimeout(() => {
                alert.remove();
            }, 500);
        }
    }, 2000); // 2 detik
</script>
@endif

    </table>

    <!-- Back Home -->
    <div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-admin') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>

</div>

<footer class="fixed bottom-0 left-0 w-full 
               text-white/80 text-center py-2 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>