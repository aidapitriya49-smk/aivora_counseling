<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col relative" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d); background-attachment: fixed;">

    <header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
        <div class="flex items-center">
            <a href="{{ route('admin.profil') }}" class="flex items-center gap-2 hover:opacity-80 transition cursor-pointer">
                <div class="w-12 h-12 rounded-full overflow-hidden border border-white/50 bg-gray-200">
                  <img src="{{ asset('images/' . ($admin->foto ?? 'profilelakilaki.png')) }}" class="w-full h-full object-cover"onerror="this.src='/images/profilelakilaki.png'">
                </div>
              <span class="text-white text-base font-medium">{{ $admin->name ?? 'Admin' }}</span></a>
            <div class="flex items-center gap-3 ml-auto">
                <span class="text-xl cursor-pointer text-white">🔔</span>
                  <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                      <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                        Logout
                      </button>
                  </form>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-32 px-12 pb-20">
        <div class="flex flex-col mb-6">
            <h2 class="text-white text-3xl font-bold tracking-wide">Daftar Data Pengguna</h2>
              <p class="text-white/80 text-sm mt-1">Memantau semua akun yang terdaftar (Admin, Guru, dan Siswa)</p>
                <div class="mt-4">
                  <a href="{{ route('admin.registrasiGuru') }}" 
                   class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-xl shadow-lg transition-all transform hover:scale-105 text-sm">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                     </svg>Tambah Data Guru
                   </a>
                </div>
           </div>
        @if(session('success'))
            <div id="successAlert" class="bg-green-500 text-white p-3 rounded-xl mb-4 shadow-lg w-fit transition-opacity duration-500">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full text-white text-sm border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 border-b border-white/40 uppercase text-[10px] font-black tracking-widest">Nama</th>
                        <th class="px-6 py-3 border-b border-white/40 uppercase text-[10px] font-black tracking-widest">Email</th>
                        <th class="px-6 py-3 border-b border-white/40 uppercase text-[10px] font-black tracking-widest">Role</th>
                        <th class="px-6 py-3 border-b border-white/40 uppercase text-[10px] font-black tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-white/10 backdrop-blur-sm hover:bg-white/20 transition">
                        <td class="px-6 py-4 rounded-l-2xl font-semibold">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 uppercase font-bold text-[10px]">{{ $user->role }}</td>
                        <td class="px-6 py-4 rounded-r-2xl">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.editUser', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-red-600 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-8">
            <a href="{{ route('admin.informasiRingkas') }}" 
       class="text-white/70 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-white transition text-sm">
        BACK HOME >
    </a>
        </div>
    </main>
    
    <footer class="text-white/40 text-center py-4 text-[10px]">
        © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
    </footer>

    <script>
        setTimeout(function() {
            const alert = document.getElementById('successAlert');
            if(alert) {
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</body>
</html>