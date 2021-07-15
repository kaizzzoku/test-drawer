<?php


namespace App\Drawers;


trait CanSave
{
    public function makeFileName(string $path, string $ext, $name = 'file'): string
    {
        return $path . '/' . $name . '_' . date('m.d.y_H:m:s') . ".$ext";
    }
}