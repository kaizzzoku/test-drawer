<?php


namespace App\Drawers\Circle;

use App\Drawers\CanSave;
use App\Drawers\CircleDrawer;

class CirclePngDrawer extends CircleDrawer
{
    use CanSave;

    public function draw(int $width, int $height, ?string $path = null): void
    {
        $img = imagecreate($width, $height);

        $bg_color = imagecolorallocate($img, 255, 255, 255);
        imagefill($img, 0, 0, $bg_color);

        $color = imagecolorallocate($img, 0, 0, 0);
        imageellipse($img, $width/2, $height/2, $width-1, $height-1, $color);

        $name = $this->makeFileName($path, 'png');

        imagepng($img, $name);
    }
}