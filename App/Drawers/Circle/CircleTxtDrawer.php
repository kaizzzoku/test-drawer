<?php


namespace App\Drawers\Circle;

use App\Drawers\CanSave;
use App\Drawers\CircleDrawer;
use App\Drawers\UseSymbols;

class CircleTxtDrawer extends CircleDrawer
{
    use CanSave, UseSymbols;

    public function draw(int $width, int $height, ?string $path = null): void
    {
        $lines = [];
        $result = '';

        $half_height = round($height/2, 0, PHP_ROUND_HALF_DOWN);

        # Create array of lines
        for ($line = 0; $line < $height + 1; $line++) {
            for ($x = 0; $x < $width + 1; $x++) {
                $lines[$line][$x] = $x ? $this->getOutlineSymbol() : $this->getFillSymbol();
                $distance = sqrt(($line - $half_height) * ($line - $half_height) + ($x - $half_height)*($x - $half_height));

                $lines[$line][$x] = ($distance > $half_height - 0.5 && $distance < $half_height + 0.5) ? $this->getOutlineSymbol() : $this->getFillSymbol();
            }
        }

        # Make string from array
        foreach ($lines as $line) {
            $result .= implode('', $line)."\n";
        }

        file_put_contents($this->makeFileName($path, 'txt'), $result);
    }
}