<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans min-h-screen flex flex-col items-center justify-start"
      style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

    <!-- ================= NAVBAR ================= -->
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

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-1 rounded-full text-sm hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- ================= JUDUL + TOMBOL ================= -->
    <div class="absolute top-20 left-12 right-6 flex items-center z-20">
        <h2 class="text-white text-3xl md:text-2xl font-bold tracking-wide">
            REGISTRASI GURU BK
        </h2>

        <button id="btnTambah"
            class="ml-auto mr-20 mt-4 inline-flex bg-blue-800 text-white font-semibold px-10 py-1 rounded-full shadow-lg hover:bg-gray-600 transition">
            + Tambah
        </button>
    </div>

    <!-- ================= SECTION ================= -->
    <section class="flex flex-col items-center pt-36 px-6 w-full">

        <!-- KOTAK PUTIH BESAR -->
       <div class="relative w-11/12 max-w-6xl bg-white/30 rounded-3xl shadow-xl p-10 overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0 flex justify-center items-center gap-6 opacity-20 pointer-events-none">
        <img src="/images/gurulakilaki.png" class="w-72 object-contain drop-shadow-2xl">
        <img src="/images/guruperempuan.png" class="w-80 object-contain drop-shadow-2xl">
    </div>

    <!-- FORM -->
    <form id="formContainer" action="{{ route('admin.storeGuru') }}" method="POST"
          class="space-y-4 relative z-10">

        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap Guru</label>
            <input type="text" name="name" required
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email (untuk Login)</label>
            <input type="email" name="email" required
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password Sementara</label>
            <input type="password" name="password" required
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Simpan Data Guru
        </button>

    </form>
</div>
<div class="flex justify-end mt-4">
        <a href="{{ route('dashboard-admin') }}" 
       class="relative -top-6 font-arimo text-gray-400 font-semibold px-4 py-2 rounded-lg hover:underline hover:text-gray-600 transition text-sm">
       BACK HOME >
    </a>
    </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="w-full text-white/80 text-center py-2 text-[12px] mt-auto">
        © 2026 E-Counseling. All Rights Reserved.
    </footer>

    <!-- ================= SCRIPT ================= -->
    <script>

        const btnTambah = document.getElementById('btnTambah');
        const formContainer = document.getElementById('formContainer');
        const firstInput = formContainer.querySelector('input');

        btnTambah.addEventListener('click', function () {

            formContainer.classList.remove('opacity-50', 'pointer-events-none');

            firstInput.focus();

            btnTambah.disabled = true;
            btnTambah.classList.remove('bg-blue-800');
            btnTambah.classList.add('bg-gray-400');
            btnTambah.innerText = "Form Aktif";

        });

    </script>

</body>
</html>