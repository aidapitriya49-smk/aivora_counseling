<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col font-sans"
      style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<!-- NAVBAR -->
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
            <button class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                Logout
            </button>
        </div>

    </div>
</header>

<!-- CONTENT -->
<main class="flex-1 pt-28 px-8 text-white">

    <!-- Judul -->
    <div class="text-center mb-10">
        <p class="text-white/70 tracking-[4px] text-sm">Ringkasan Sistem</p>
        <h1 class="text-3xl font-bold mt-2">DATA MASTER</h1>
    </div>

    <!-- KOTAK PUTIH BESAR -->
    <div class="max-w-4xl mx-auto bg-white/30 backdrop-blur-md 
                rounded-3xl shadow-2xl p-10">

    <!-- GAMBAR DI BELAKANG -->
  <div class="absolute inset-0 flex justify-center items-center gap-6 opacity-25">
    <img src="/images/masterlogo.png"
         class="w-100 object-contain drop-shadow-2xl">
</div>

        <!-- 4 BOX STATISTIK -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

            <div class="rounded-2xl p-6 text-center shadow-md border border-white"
     style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);  ">

    <!-- ICON GAMBAR -->
    <div class="flex justify-center mb-3">
        <div class="w-12 h-12  flex items-center justify-center ">
            <img src="/images/logopengguna.png" 
                 class="w-10 h-10 object-contain">
        </div>
    </div>

    <p class="text-gray-400 text-xs -mt-3">Total Pengguna</p>
<p class="text-gray-400 font-bold text-lg">3</p>
</div>

           <div class="rounded-2xl p-6 text-center shadow-md border border-white bg-[#d8d5ca]"
     style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">

    <!-- ICON GAMBAR -->
    <div class="flex justify-center mb-2">
        <div class="w-12 h-12   items-center justify-center">
            <img src="/images/datasiswa.png" 
                 class="w-12 h-12 object-contain">
        </div>
    </div>

    <p class="text-gray-400 text-xs -mt-3">Data Siswa</p>
    <p class="text-gray-400 font-bold text-lg">0</p>

</div>

           <div class="rounded-2xl p-6 text-center shadow-md border border-white bg-[#d8d5ca]"
     style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">

    <!-- ICON GAMBAR -->
    <div class="flex justify-center mb-2">
        <div class="w-12 h-12   items-center justify-center">
            <img src="/images/totalkonseling.png" 
                 class="w-10 h-10 object-contain">
        </div>
    </div>

    <p class="text-gray-400 text-xs -mt-3">Total Konseling</p>
    <p class="text-gray-400 font-bold text-lg">0</p>

</div>
            <div class="rounded-2xl p-6 text-center shadow-md border border-white bg-[#d8d5ca]"
     style="background: linear-gradient(180deg, #fffcf5, #d8d5ca);">

    <!-- ICON GAMBAR -->
    <div class="flex justify-center mb-2">
        <div class="w-12 h-12   items-center justify-center">
            <img src="/images/Pelanggaranlogo.png" 
                 class="w-10 h-10 object-contain">
        </div>
    </div>

    <p class="text-gray-400 text-xs -mt-3">Pelanggaran</p>
    <p class="text-gray-400 font-bold text-lg">0</p>

</div>

        </div>

        <!-- STATUS DATABASE -->
        <div class="bg-white rounded-2xl p-6 shadow-md flex justify-between items-center">

            <p class="text-sm">
                <span class="text-blue-600 font-semibold">Status:</span>
                <span class="text-green-500 font-semibold">Database Aktif</span>
            </p>

            <p class="text-gray-500 text-xs">
                Update: 28 Feb 2026
            </p>

        </div>

    </div>

    <!-- BACK HOME -->
    <div class="flex justify-end mt-4 mr-20">
    <a href="{{ route('dashboard-admin') }}" 
       class="font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
</div>

</main>

<!-- FOOTER -->
<footer class="w-full text-white/80 text-center py-3 text-[12px]">
    © 2026 E-Counseling. All Rights Reserved Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>