<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function logo(Request $request){
        // İsteğin içinden dosyayı al
        $file = $request->file('file');

        // Eğer dosya varsa
        if ($file) {
            // Dosyayı istenilen klasöre kaydet (storage/app/public klasörüne kaydetmek için)
            $filePath = $file->store('public');

            // Dosya yolu içindeki "public/" kısmını kaldır
            $filePath = str_replace('public/', '', $filePath);

            // Kaydedilen dosyanın yolunu döndür
            return response()->json(['message' => __('install.result.upload_success'), 'file_path' => $filePath]);
        }

        // Eğer dosya yoksa hata döndür
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
