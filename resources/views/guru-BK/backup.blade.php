<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Database - Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d); background-attachment: fixed;">

    <main class="flex-1 p-8 flex items-center justify-center">
        <div class="w-full max-w-md bg-white/20 backdrop-blur-md rounded-3xl p-8 border border-white/30 shadow-2xl text-center">
            <div class="mb-6">
                <div class="w-20 h-20 bg-blue-500/50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-database text-white text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Backup Database</h2>
                <p class="text-white/70 text-sm">Amankan data konseling dan siswa dengan mengunduh salinan database terbaru.</p>
            </div>

            <div class="bg-black/20 rounded-xl p-4 mb-8 text-left border border-white/10">
                <ul class="text-xs text-white/80 space-y-2">
                    <li><i class="fas fa-check-circle text-green-400 me-2"></i> Format file: .sql</li>
                    <li><i class="fas fa-check-circle text-green-400 me-2"></i> Termasuk tabel: siswa, konseling, guru_bk</li>
                    <li><i class="fas fa-check-circle text-green-400 me-2"></i> Tanggal: {{ date('d M Y') }}</li>
                </ul>
            </div>

            <a href="{{ route('guru-bk.download') }}" 
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 rounded-2xl transition transform hover:scale-105 shadow-lg">
                <i class="fas fa-download me-2"></i> DOWNLOAD SEKARANG
            </a>

            <a href="{{ route('dashboard-guru-bk') }}" class="inline-block mt-6 text-white/50 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </main>

    <footer class="w-full text-white/80 text-center py-4 text-[12px]">
         © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
    </footer>
</body>
</html>