<aside class="w-72 flex flex-col p-6 space-y-6">
    <div class="flex items-center space-x-4 mb-8">
        <div class="w-12 h-12 rounded-full bg-sky-300 flex items-center justify-center overflow-hidden shadow-md border-2 border-white">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=68E1FD&color=fff" alt="Avatar">
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Administrator</p>
            <p class="font-bold text-gray-800 leading-tight">{{ Auth::user()->name }}</p>
        </div>
    </div>

    <nav class="space-y-8">
        <div>
            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Home</p>
            <a href="{{ route('home') }}" class="flex items-center px-6 py-3 bg-white text-[#1d1d42] rounded-full font-bold shadow-sm border border-gray-100">
                <span class="mr-3">📊</span> Dashboard
            </a>
        </div>

        <div>
            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Component</p>
            <div class="flex flex-col space-y-1">
                <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:text-gray-900 transition font-bold text-sm">
                    <span class="mr-3 text-lg">ℹ️</span> Informasi Ringkas
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:text-gray-900 transition font-bold text-sm">
                    <span class="mr-3 text-lg">👥</span> Data Pengguna
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:text-gray-900 transition font-bold text-sm">
                    <span class="mr-3 text-lg">📁</span> Data Master
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:text-gray-900 transition font-bold text-sm">
                    <span class="mr-3 text-lg">📈</span> Statistik Sistem
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:text-gray-900 transition font-bold text-sm">
                    <span class="mr-3 text-lg">🕒</span> Aktivitas Terbaru
                </a>
            </div>
        </div>
    </nav>
</aside>