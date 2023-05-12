<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller {

    public function download() {
        // Logic to download the file
        $file = storage_path('app/forms_preenchidos/q252_preenchido.pdf');
        $fileName = 'q252_preenchido.pdf';
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=' . $fileName,
        ];

        // Perform the download
        if (File::exists($file)) {
            return response()->download($file, $fileName, $headers)->deleteFileAfterSend(true);
        }

        return back();
    }
}
