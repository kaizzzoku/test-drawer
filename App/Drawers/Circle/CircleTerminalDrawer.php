<?php


namespace App\Drawers\Circle;

use App\Drawers\CircleDrawer;
use App\Drawers\UseSymbols;

class CircleTerminalDrawer extends CircleDrawer
{
    use UseSymbols;

    public function draw(int $width, int $height, ?string $path = null): void
    {
        $lines = [];
        $result = '';

        $half_height = round($height/2, 0, PHP_ROUND_HALF_DOWN);
        $half_width = round($width/2, 0, PHP_ROUND_HALF_DOWN);

        # Create array of lines
        for ($line = 0; $line < $height + 1; $line++) {
            for ($x = 0; $x < $width + 1; $x++) {
                $lines[$line][$x] = $x ? $this->getOutlineSymbol() : $this->getFillSymbol();
                $distance = sqrt(($line - $half_height) * ($line - $half_height) + ($x - $half_width)*($x - $half_width));

                $lines[$line][$x] = ($distance > $half_width - 0.5 && $distance < $half_width + 0.5) ? $this->getOutlineSymbol() : $this->getFillSymbol();
            }
        }

        # Make string from array
        foreach ($lines as $line) {
            $result .= implode('', $line)."\n";
        }

        echo $result;
    }
}