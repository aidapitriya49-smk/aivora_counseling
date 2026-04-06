<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalSiswa = \App\Models\User::where('role', 'siswa')->count();
        $totalGuru = \App\Models\User::where('role', 'guru')->count();
        $totalKonseling = 50; 
        $totalPelanggaran = 1; 
        return view('home', compact('totalSiswa', 'totalGuru', 'totalKonseling', 'totalPelanggaran'));
    }
}