<?php

// app/Http/Controllers/BackupController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    public function download($filename)
    {
        $filePath = storage_path('app/backups/' . $filename);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }


}

