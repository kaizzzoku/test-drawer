<?php


namespace App\Drawers;


interface DrawerInterface
{
    public function draw(int $width, int $height, ?string $path = null): void;
}