<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Surat WA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans min-h-screen flex flex-col" style="background: linear-gradient(180deg, #a8dfd6, #7754f4, #0e204d);">

<main class="mt-32 px-12 pb-20">
    <div class="p-8 text-white max-w-lg mx-auto bg-white/20 backdrop-blur-md rounded-3xl border border-white/30">
        <h2 class="text-xl font-black mb-6 uppercase">Kirim Surat ke Orang Tua</h2>
        
        {{-- HANYA ADA SATU FORM DI SINI --}}
       {{-- Ganti action form-nya ke kirim_wa --}}
<form action="{{ route('guru-bk.kirim_wa') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block text-xs font-bold uppercase mb-2">Nomor WA Orang Tua</label>
        <input type="text" name="nomor_ortu" 
               class="w-full bg-white/10 border border-white/20 rounded-xl p-3 text-white focus:outline-none" 
               value="{{ $siswa->nomor_hp_ortu ?? '6285951335914' }}" required>
    </div>

    <div class="mb-4">
        <label class="block text-xs font-bold uppercase mb-2">Isi Pesan</label>
        <textarea name="isi_surat" rows="6" 
                  class="w-full bg-white/10 border border-white/20 rounded-xl p-3 text-white focus:outline-none">
Yth. Orang Tua dari {{ $siswa->name }},

Kami dari Guru BK ingin menginformasikan bahwa ananda {{ $siswa->name }} memerlukan bimbingan konseling di sekolah.
        </textarea>
    </div>
    
    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 p-3 rounded-xl font-black uppercase">
        🚀 Kirim Sekarang
    </button>
</form>
    </div>
</main>

</body>
</html>