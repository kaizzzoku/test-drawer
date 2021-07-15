<?php


namespace App\Inputs;

class TerminalInput
{
    public string $drawer_type;
    public string $drawer_name;
    public int $height;
    public int $width;

    public function parse($params)
    {
        if (count($params) < 5) {
            echo "Not enough arguments provided.\n";
            die();
        }

        $this->drawer_type = $params[1];
        $this->drawer_name = $params[2];
        $this->width = $params[3];
        $this->height = $params[4];
    }
}