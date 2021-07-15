<?php


namespace App;

use App\Drawers\DrawerInterface;

class Core
{
    public function handle(DrawerInterface $drawer, int $width, int $height)
    {
        $drawer->draw($width, $height, $this->getOutputPath());
    }

    private function getOutputPath()
    {
        return getenv('OUTPUT_PATH');
    }
}