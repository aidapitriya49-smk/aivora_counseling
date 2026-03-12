<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Guru BK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* Gradient valid */
            background: linear-gradient(90deg, #cdfd88, #94b9ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* supaya footer tetap di bawah */
            align-items: center;     
            justify-content: center;  
        }


        .glass-card {
            background: rgba(255, 255, 255, 0.25); /* semi-transparent */
            backdrop-filter: blur(10px);
            border-radius: 2.5rem;
            border: 6px solid rgba(255,255,255,0.4);
        }
    </style>
</head>
<body>

  <!-- HEADER SEKOLAH -->
    <div class="absolute top-6 left-10 flex items-center gap-3">
        <img src="/images/logobbc.png" 
             alt="Logo Sekolah"
             class="w-10 h-10 object-contain">
        <span class="font-bold text-white text-lg tracking-wide drop-shadow">
            SMK BUDI BAKTI CIWIDEY
        </span>
    </div>
    <div class="glass-card p-10 w-full max-w-md shadow-2xl">
        <h2 class="text-5xl font-bold text-center mb-2"style="background: linear-gradient(90deg, #000000, #3533cd);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;color: transparent;">Welcome Back</h2>
      <p class="text-[10px] text-center text-white mb-8 uppercase tracking-widest">
    Sign in to continue your account
</p>
        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-4 text-xs">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-4">
              <input type="email" name="email" placeholder="masukkan email/username"class="w-full px-5 py-3 rounded-2xl  text-sm placeholder:text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>
                <div class="relative">
                   <input type="password" name="password" placeholder="masukkan password anda"class="w-full px-5 py-3 rounded-2xl  text-sm placeholder:text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-sm" required>
                </div>
                 <a href="#" class="block text-[12px] text-black text-right mt-2">
    Forgot Password?
</a>
                 <button type="submit" 
        class="w-full py-4 text-white font-bold rounded-2xl transition shadow-lg uppercase text-sm tracking-widest mt-4 hover:opacity-90"
        style="background: linear-gradient(90deg, #8c52ff, #ff914d);">
    Login
</button>
            </div>
<p class="text-center text-xs text-black-200 mt-4">
    Don't have an account?
    <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:underline"">
        Register here
    </a>
</p>
        </form> 
    </div>
   <footer class="w-full bg-gray-400/20 text-black-600 text-center py-1 text-[12px] absolute bottom-0">
    © AIVORA 2026 E-Counseling. All Rights Reserved. Developed for Educational Guidance and Counseling.
</footer>
</body>
</html>