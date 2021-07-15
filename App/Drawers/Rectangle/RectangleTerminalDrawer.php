<?php


namespace App\Drawers\Rectangle;

use App\Drawers\CanSave;
use App\Drawers\RectangleDrawer;
use App\Drawers\UseSymbols;

class RectangleTerminalDrawer extends RectangleDrawer
{
    use UseSymbols;

    public function draw(int $width, int $height, ?string $path = null): void
    {
        $lines = [];
        $result = '';

        # Create array of lines
        for ($line = 0; $line < $height; $line++) {
            for ($i = 0; $i < $width; $i++) {
                $lines[$line][$i] = $i == 0 || $i + 1 == $width || $line == 0 || $line + 1 == $height ? $this->getOutlineSymbol() : $this->getFillSymbol();
            }
        }

        # Make string from array
        foreach ($lines as $line) {
            $result .= implode('', $line)."\n";
        }

        echo $result;
    }
}