<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Counseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
         body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f9fafc; overflow: hidden; }
        .glass-card { background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.8); }
        
    </style>
</head>
<body class="min-h-screen flex p-6 gap-8">
    <aside class="w-80 flex flex-col gap-8">
        <div class="bg-white/50 p-10 rounded-[45px] flex flex-col items-center shadow-sm border border-white/40">
            <div class="w-24 h-24 bg-blue-300 rounded-full mb-6 border-4 border-white shadow-md overflow-hidden">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=7FB3FF&color=fff" alt="User">
            </div>
            <p class="text-xl font-black text-[#1d1d42] mb-1">{{ Auth::user()->name }}</p>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[3px] mb-8">Administrator</p>
            
            <button type="button" onclick="confirmLogout()" class="bg-[#FF7373] text-white px-10 py-3 rounded-2xl text-[11px] font-black shadow-lg hover:scale-105 transition-all uppercase">
                Logout
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="bg-white/50 p-10 rounded-[45px] flex-1 shadow-sm border border-white/40">
            <div class="mb-14">
                <p class="text-[11px] font-black text-gray-400 uppercase mb-8 px-4 tracking-[4px]">Home</p>
                <a href="#" class="block px-6 py-5 sidebar-active text-xl font-black text-[#1d1d42] text-center">Dashboard</a>
            </div>

            <div>
                <p class="text-[11px] font-black text-gray-400 uppercase mb-10 px-4 tracking-[4px]">Component</p>
                <div class="flex flex-col space-y-10 px-4">
                    <a href="#" class="flex items-center gap-5 text-lg font-bold text-gray-600 hover:text-blue-500 hover:translate-x-2 transition-all">
                        <span class="text-2xl">📊</span> Informasi Ringkas
                    </a>
                    <a href="#" class="flex items-center gap-5 text-lg font-bold text-gray-600 hover:text-blue-500 hover:translate-x-2 transition-all">
                        <span class="text-2xl">👥</span> Data Pengguna
                    </a>
                    <a href="#" class="flex items-center gap-5 text-lg font-bold text-gray-600 hover:text-blue-500 hover:translate-x-2 transition-all">
                        <span class="text-2xl">📁</span> Data Master
                    </a>
                    <a href="#" class="flex items-center gap-5 text-lg font-bold text-gray-600 hover:text-blue-500 hover:translate-x-2 transition-all">
                        <span class="text-2xl">📈</span> Statistik Sistem
                    </a>
                    <a href="#" class="flex items-center gap-5 text-lg font-bold text-gray-600 hover:text-blue-500 hover:translate-x-2 transition-all">
                        <span class="text-2xl">🕒</span> Aktivitas Terbaru
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 glass-card rounded-[60px] shadow-2xl flex flex-col overflow-hidden">
        
        <nav class="px-12 py-8 flex justify-between items-center border-b border-white/30">
            <div>
                <h1 class="text-xs font-black text-gray-400 uppercase tracking-[4px] mb-1">Halaman Utama</h1>
                <p class="text-2xl font-black text-[#1d1d42]">Dashboard Overview</p>
            </div>

            <div class="flex items-center gap-8">
                <div class="hidden md:flex bg-white/40 px-6 py-3 rounded-2xl border border-white items-center gap-3 w-80 shadow-sm">
                    <span class="opacity-50">🔍</span>
                    <input type="text" placeholder="Cari data..." class="bg-transparent text-sm font-bold outline-none w-full text-[#1d1d42] placeholder-gray-400">
                </div>

                <div class="flex items-center gap-5 border-l border-gray-300 pl-8">
                    <div class="relative bg-white/50 p-3 rounded-xl shadow-sm border border-white cursor-pointer hover:bg-white transition-all">
                        <span class="text-lg">🔔</span>
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-black text-[#1d1d42]">{{ Auth::user()->name }}</p>
                            <p class="text-[9px] font-bold text-blue-500 uppercase tracking-wider">Online</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=4D76FD&color=fff" class="w-10 h-10 rounded-xl border-2 border-white shadow-sm">
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-1 px-12 py-10 overflow-y-auto scrollbar-hide">
            
            <div class="grid grid-cols-4 gap-8 mb-12">
                <div class="bg-white p-8 rounded-[40px] shadow-sm flex flex-col items-center text-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase mb-4 tracking-widest">Total Siswa</p>
                    <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" class="w-12 mb-4">
                    <h3 class="text-3xl font-black text-[#1d1d42]">{{ $totalSiswa }}</h3>
                </div>
                <div class="bg-white p-8 rounded-[40px] shadow-sm flex flex-col items-center text-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase mb-4 tracking-widest">Total Guru BK</p>
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995531.png" class="w-12 mb-4">
                    <h3 class="text-3xl font-black text-[#1d1d42]">{{ $totalGuru }}</h3>
                </div>
                <div class="bg-white p-8 rounded-[40px] shadow-sm flex flex-col items-center text-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase mb-4 tracking-widest">Total Konseling</p>
                    <img src="https://cdn-icons-png.flaticon.com/512/2462/2462719.png" class="w-12 mb-4">
                    <h3 class="text-3xl font-black text-[#1d1d42]">50</h3>
                </div>
                <div class="bg-white p-8 rounded-[40px] shadow-sm flex flex-col items-center text-center border-2 border-red-50">
                    <p class="text-[10px] font-black text-gray-400 uppercase mb-4 tracking-widest">Pelanggaran</p>
                    <div class="text-4xl mb-4">⚠️</div>
                    <h3 class="text-3xl font-black text-red-500">1</h3>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-12">
                <div class="col-span-2 bg-white p-12 rounded-[50px] shadow-sm border border-gray-50">
                    <h4 class="font-black text-gray-700 mb-10 flex items-center gap-3">
                        <span class="w-2 h-8 bg-blue-500 rounded-full shadow-sm shadow-blue-200"></span> Statistik Bulanan
                    </h4>
                    <div class="h-[350px]">
                        <canvas id="canvaChart"></canvas>
                    </div>
                </div>

                <div class="flex flex-col gap-8">
                    <div class="bg-[#F0F4FF] p-10 rounded-[45px] border border-blue-50">
                        <h4 class="font-black text-[#4D76FD] mb-8 text-xs uppercase tracking-[3px]">Informasi Ringkas</h4>
                        <div class="space-y-5">
                            <div class="bg-white p-4 rounded-2xl flex justify-between shadow-sm items-center hover:scale-105 transition-all">
                                <span class="text-[11px] font-bold text-gray-400">Sesi Konseling</span>
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-xs font-black">50</span>
                            </div>
                            <div class="bg-white p-4 rounded-2xl flex justify-between shadow-sm items-center hover:scale-105 transition-all">
                                <span class="text-[11px] font-bold text-gray-400">Total Pengguna</span>
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-xs font-black">200</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-10 rounded-[45px] shadow-sm border border-gray-50 flex-1">
                        <h4 class="font-black text-gray-700 mb-8 text-xs uppercase tracking-[3px]">Aktivitas</h4>
                        <div class="space-y-8">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center shadow-sm">✨</div>
                                <p class="text-[11px] font-bold text-gray-500">Sesi konseling baru oleh Guru A</p>
                            </div>
                            <div class="flex items-center gap-4 border-t border-gray-50 pt-6">
                                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center shadow-sm">➕</div>
                                <p class="text-[11px] font-bold text-gray-500">Pengguna baru ditambahkan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Anda yakin ingin logout?',
                text: "Anda akan diarahkan kembali ke halaman login.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2d3250', // Warna biru gelap
                cancelButtonColor: '#FF7373',  // Warna merah tombol kamu
                confirmButtonText: 'Iya, Logout!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jalankan form logout jika pengguna klik "Iya"
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>

    <script>
        const ctx = document.getElementById('canvaChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, '#4D76FD');
        gradient.addColorStop(1, '#946CFF');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    data: [12, 19, 13, 15, 22, 10],
                    backgroundColor: gradient,
                    borderRadius: 20,
                    barPercentage: 0.5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { grid: { display: false }, ticks: { font: { weight: 'bold', size: 11 } } },
                    x: { grid: { display: false }, ticks: { font: { weight: 'bold', size: 11 } } }
                }
            }
        });
    </script>
</body>
</html>