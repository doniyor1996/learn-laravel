<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Storage;

class FileUploaderService
{
    private const PATH = 'images/';

    public function uploadPhoto(UploadedFile $file, Model $model): bool|string
    {
        $path = self::PATH . $model->id;
        if (!Storage::directoryExists($path)){
            Storage::makeDirectory($path);
        }
        return $file->store($path);
    }
}
