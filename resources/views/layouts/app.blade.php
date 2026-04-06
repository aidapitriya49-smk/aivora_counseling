<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

    <header class="fixed top-0 left-0 w-full bg-white/20 backdrop-blur-md border-b border-white/20 shadow-md z-50 px-8 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 rounded-full overflow-hidden border border-white/50 bg-white/20">
                    <img src="{{ asset('images/' . (Auth::user()->foto ?? 'profilelakilaki.png')) }}" 
                         class="w-full h-full object-cover"
                         onerror="this.src='{{ asset('images/profilelakilaki.png') }}'">
                </div>
                <span class="text-white text-base font-medium">{{ Auth::user()->name ?? 'User' }}</span>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <div class="flex flex-1 pt-20">
        <aside class="w-64 fixed h-full px-6">
            <div class="flex flex-col items-center mb-6">
                <div class="w-14 h-14 overflow-hidden mb-2">
                    <img src="/images/logobbc.png" alt="Logo" class="w-full h-full object-cover">
                </div>
                <span class="text-white text-center font-bold text-sm">SMK BUDI BAKTI CIWIDEY</span>
            </div>

            <nav>
                <ul class="space-y-3 text-white font-medium">
                    @if(Auth::user()->role == 'admin')
                        <li class="{{ request()->routeIs('admin.informasiRingkas') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                            <a href="{{ route('admin.informasiRingkas') }}" class="block">Dashboard</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.dataPengguna') ? 'bg-white/30' : '' }} px-4 py-2 rounded-lg hover:bg-white/20 transition">
                            <a href="{{ route('admin.dataPengguna') }}" class="block">Data Pengguna</a>
                        </li>
                    @elseif(Auth::user()->role == 'guru')
                        <li class="px-4 py-2 rounded-lg hover:bg-white/20 transition">
                            <a href="{{ route('guru-bk.dashboard') }}" class="block">Dashboard Guru</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </aside>

        <main class="flex-1 ml-64 p-8">
            @yield('content') </main>
    </div>

    <footer class="w-full text-white/60 text-center py-4 text-[10px] mt-auto">
        © 2026 E-Counseling. All Rights Reserved.
    </footer>
</body>
</html>