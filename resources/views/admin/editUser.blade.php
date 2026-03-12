<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Reset Password</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center"
style="background: linear-gradient(180deg,#a8dfd6,#7754f4,#0e204d);">

<div class="bg-white/20 backdrop-blur-md p-8 rounded-2xl shadow-lg w-[400px] text-white">

<h2 class="text-2xl font-bold mb-6 text-center">Reset Password</h2>

<form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
@csrf
@method('PUT')

<!-- Nama User -->
<div class="mb-4">
<label class="block text-sm">Nama</label>
<input type="text" value="{{ $user->name }}" 
class="w-full p-2 rounded-lg text-black" disabled>
</div>

<!-- Email -->
<div class="mb-4">
<label class="block text-sm">Email</label>
<input type="email" value="{{ $user->email }}" 
class="w-full p-2 rounded-lg text-black" disabled>
</div>

<!-- Password Baru -->
<div class="mb-6">
<label class="block text-sm">Password Baru</label>
<input type="password" name="password"
class="w-full p-2 rounded-lg text-black" required>
</div>

<button class="w-full bg-indigo-600 py-2 rounded-lg hover:bg-indigo-700">
Reset Password
</button>

</form>

<div class="text-center mt-4">
<a href="{{ route('admin.dataPengguna') }}" class="underline text-sm">
Kembali
</a>
</div>

</div>

</body>
</html>