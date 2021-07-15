<?php


namespace App;

use App\Drawers\Circle\CircleTxtDrawer;
use App\Drawers\Circle\CirclePngDrawer;
use App\Drawers\Circle\CircleTerminalDrawer;
use App\Drawers\DrawerInterface;
use App\Drawers\Rectangle\RectangleTxtDrawer;
use App\Drawers\Rectangle\RectanglePngDrawer;
use App\Drawers\Rectangle\RectangleTerminalDrawer;

class DrawerManager
{
    private array $drawers = [
        'circle' => [
            'txt' => CircleTxtDrawer::class,
            'terminal' => CircleTerminalDrawer::class,
            'png' =>  CirclePngDrawer::class,
        ],
        'rectangle' => [
            'txt' => RectangleTxtDrawer::class,
            'terminal' => RectangleTerminalDrawer::class,
            'png' =>  RectanglePngDrawer::class,
        ],
    ];

    public function createDriver(string $type, $name): ?DrawerInterface
    {
        if (array_key_exists($type, $this->drawers) && array_key_exists($name, $this->drawers[$type])) {
            return new $this->drawers[$type][$name];
        }

        return null;
    }
}