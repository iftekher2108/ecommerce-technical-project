<?php

namespace Shop\Admin\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{
    public static function fileUpload($dirPath, $filename, $file)
    {
        $filename = $filename . '-' . date('d-M-Y') . '-' . time().'-'. Str::ulid() . "." . $file->extension();
        $file->storeAs($dirPath, $filename, 'public');
        return $dirPath . '/' . $filename;
    }

    public static function fileDelete($path)
    {
        if (! $path) {
            return;
        }
        Storage::disk('public')->delete($path);
    }
}
