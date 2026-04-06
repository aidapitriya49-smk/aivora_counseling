<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(90deg, #cdfd88, #94b9ff);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.25); 
            backdrop-filter: blur(10px);
            border-radius: 2.5rem;
            border: 6px solid rgba(255,255,255,0.4);
        }
    </style>
</head>

<body class="relative w-full flex flex-col min-h-screen">

    <div class="p-6 md:absolute md:top-6 md:left-10 flex items-center gap-3">
        <img src="/images/logobbc.png" alt="Logo Sekolah" class="w-10 h-10 object-contain">
        <span class="font-bold text-white text-lg tracking-wide drop-shadow">
            SMK BUDI BAKTI CIWIDEY
        </span>
    </div>

    <div class="flex-grow flex items-center justify-center px-4 py-10">
        <div class="glass-card p-10 w-full max-w-md shadow-2xl">
            <h2 class="text-3xl font-bold text-center mb-2"
                style="background: linear-gradient(90deg, #000000, #3533cd);
                       -webkit-background-clip: text;
                       -webkit-text-fill-color: transparent;
                       background-clip: text;
                       color: transparent;">
                Create Account
            </h2>

            <p class="text-[10px] text-center text-gray-600 mb-6 uppercase tracking-widest">
                Join us to start your journey
            </p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <input type="text" name="name" placeholder="Masukkan nama lengkap"
                        class="w-full px-5 py-3 rounded-2xl border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>

                    <input type="email" name="email" placeholder="Masukkan email anda"
                        class="w-full px-5 py-3 rounded-2xl border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>

                    <input type="password" name="password" placeholder="Buat password"
                        class="w-full px-5 py-3 rounded-2xl border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>

                    <input type="password" name="password_confirmation" placeholder="Konfirmasi password"
                        class="w-full px-5 py-3 rounded-2xl border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>

                    <button type="submit"
                        class="w-full py-4 text-white font-bold rounded-2xl transition shadow-lg uppercase text-sm tracking-widest mt-4 hover:opacity-90"
                        style="background: linear-gradient(90deg, #8c52ff, #ff914d);">
                        Register
                    </button>
                </div>
            </form>
            
            <p class="text-center text-[11px] text-gray-900 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:underline">
                    login here
                </a>
            </p>
        </div>
    </div>

    <footer class="w-full bg-gray-400/20 text-black-600 text-center py-1 text-[12px] absolute bottom-0">
    © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>

</body>
</html>