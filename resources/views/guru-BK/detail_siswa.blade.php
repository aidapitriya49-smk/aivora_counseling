@extends('layouts.app') {{-- Sesuaikan dengan nama layout kamu --}}

@section('content')
<div class="pt-24 px-8">
    <form action="{{ route('guru-bk.update_siswa', $siswa->id) }}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto">
        @csrf 
        @method('PUT')
        
        <h2 class="text-xl font-black mb-6 uppercase text-slate-800">Edit Identitas Siswa</h2>
        
        <div class="grid grid-cols-2 gap-4">
            <input name="nama_siswa" value="{{ $siswa->nama_siswa ?? $siswa->name }}" class="p-3 border rounded-xl" placeholder="Nama Lengkap">
            <input name="nisn" value="{{ $siswa->nisn }}" class="p-3 border rounded-xl" placeholder="NISN">
            <input name="tempat_tanggal_lahir" value="{{ $siswa->tempat_tanggal_lahir }}" class="p-3 border rounded-xl" placeholder="TTL">
            <input name="kelas" value="{{ $siswa->kelas }}" class="p-3 border rounded-xl" placeholder="Kelas">
        </div>
        
        <textarea name="alamat" class="w-full mt-4 p-3 border rounded-xl" placeholder="Alamat">{{ $siswa->alamat }}</textarea>
        
        <div class="mt-6 flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">Simpan Perubahan</button>
            <a href="{{ route('guru-bk.data_siswa') }}" class="px-6 py-2 text-slate-500 hover:text-slate-800">Kembali</a>
        </div>
    </form>
</div>
@endsection