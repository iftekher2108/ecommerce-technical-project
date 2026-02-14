<?php

namespace Shop\Admin\Classes;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function fileUpload($dirPath, $filename, $file)
    {
        $filename = $filename . '-' . date('d-M-Y') . '-' . time() . "." . $file->extension();
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
