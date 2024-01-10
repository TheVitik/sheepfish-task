<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class LogoService
{
    public function upload(UploadedFile $file): bool|string
    {
        return $file->store('logos', 'public');
    }
}