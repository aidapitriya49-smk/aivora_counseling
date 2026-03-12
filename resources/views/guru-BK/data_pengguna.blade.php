<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-300 p-6 rounded-r-3xl">
        <div class="flex items-center gap-3 mb-8">
            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            
            <div>
                <p class="font-semibold leading-tight">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Guru BK</p>
            </div>
        </div>

        <p class="text-xs text-gray-500 mb-2">HOME</p>
        <ul class="space-y-2">
            <li class="px-4 py-2 hover:bg-gray-400 rounded-lg cursor-pointer {{ request()->routeIs('guru-bk.dashboard') ? 'bg-white font-semibold' : '' }}">
                <a href="{{ route('dashboard-guru-bk') }}" class="block w-full">Dashboard</a>
            </li>
            </ul>

        <p class="text-xs text-gray-500 mt-6 mb-2">COMPONENT</p>
        <ul class="space-y-2">
            <ul class="space-y-2">
                <li class="px-4 py-2 hover:bg-gray-400 rounded-lg cursor-pointer {{ request()->routeIs('guru-bk.dataPengguna') ? 'bg-white font-semibold' : '' }}">
                    <a href="{{ route('guru-bk.dataPengguna') }}" class="block w-full">Data Pengguna</a>
                </li>
                </ul>
                <ul class="space-y-2">
                    <li class="px-4 py-2 hover:bg-gray-400 rounded-lg cursor-pointer {{ request()->routeIs('guru-bk.dataSiswa') ? 'bg-white font-semibold' : '' }}">
                        <a href="{{ route('guru-bk.dataSiswa') }}" class="block w-full">Data siswa</a>
                    </li>
                    </ul>
            <li class="px-4 py-2 hover:bg-white rounded-lg">Jadwal Konseling</li>
            <li class="px-4 py-2 hover:bg-white rounded-lg">Siswa Tindak Lanjut</li>
            <li class="px-4 py-2 hover:bg-white rounded-lg">Laporan & Export</li>
            <li class="px-4 py-2 hover:bg-white rounded-lg">Backup</li>
        </ul>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-6">

        <!-- TOPBAR -->
        <div class="flex justify-between items-center mb-6 bg-gray-300 p-4 rounded-xl">
            <h1 class="font-bold text-lg">Data pengguna</h1>
            
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium hidden md:block"><p>Selamat Datang, **{{ Auth::user()->name }}**</p></span>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition shadow-md">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        @yield('content')
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-2">Manajemen Data</h2>
                    <h3 class="text-2xl font-black text-slate-800">DATA PENGGUNA (SISWA)</h3>
                </div>
                <div class="px-4 py-2 bg-blue-50 text-blue-600 rounded-2xl text-xs font-bold border border-blue-100">
                    Total Siswa: {{ $users->count() }}
                </div>
            </div>
        
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                            <th class="pb-4 px-4">Nama Lengkap</th>
                            <th class="pb-4 px-4">Email</th>
                            <th class="pb-4 px-4">Status</th>
                            <th class="pb-4 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-700">
                        @foreach($users as $user)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-4 font-bold text-slate-800">{{ $user->name }}</td>
                            <td class="py-4 px-4 text-slate-500">{{ $user->email }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-bold uppercase">Aktif</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <button class="bg-blue-500 text-white px-4 py-1.5 rounded-xl text-[10px] font-black hover:bg-blue-600 transition shadow-sm shadow-blue-100">
                                    DETAIL
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            @if($users->isEmpty())
            <div class="text-center py-20">
                <p class="text-slate-400 text-sm italic font-medium">Belum ada data siswa terdaftar.</p>
            </div>
            @endif
        </div>

    </main>
</div>

</body>
</html>