<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    public function index()
    {
        $guru = DB::table('guru_bk')->where('id_user', auth()->id())->first();
        return view('guru-bk.backup', compact('guru'));
    }

    public function download()
    {
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $dbHost = env('DB_HOST');
        $fileName = "backup-" . date('Y-m-d_H-i-s') . ".sql";
        $command = "mysqldump --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName}";
        return new StreamedResponse(function() use ($command) {
            $handle = popen($command, 'r');
            while (!feof($handle)) {
                echo fread($handle, 1024);
            }
            pclose($handle);
        }, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}