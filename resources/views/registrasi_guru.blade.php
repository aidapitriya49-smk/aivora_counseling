@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-[3rem] p-10 shadow-xl border border-blue-50">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-slate-800">Registrasi Guru Baru</h2>
            <p class="text-gray-400 mt-2">Daftarkan akun Guru BK untuk mengakses dashboard guru</p>
        </div>

        <form action="{{ route('admin.storeGuru') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block ml-4 mb-2 text-sm font-bold text-slate-700">Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Contoh: Aida Fitriani, S.Pd" 
                       class="w-full p-4 rounded-2xl bg-slate-50 border-none ring-1 ring-slate-200 outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div>
                <label class="block ml-4 mb-2 text-sm font-bold text-slate-700">Alamat Email</label>
                <input type="email" name="email" required placeholder="email@sekolah.com" 
                       class="w-full p-4 rounded-2xl bg-slate-50 border-none ring-1 ring-slate-200 outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div>
                <label class="block ml-4 mb-2 text-sm font-bold text-slate-700">Password Sementara</label>
                <input type="password" name="password" required placeholder="••••••••" 
                       class="w-full p-4 rounded-2xl bg-slate-50 border-none ring-1 ring-slate-200 outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-5 rounded-2xl font-black shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all">
                DAFTARKAN GURU SEKARANG
            </button>
        </form>
    </div>
</div>
@endsection