<?php


namespace App\Drawers;


trait UseSymbols
{
    public function getOutlineSymbol(): string
    {
        return '#';
    }

    public function getFillSymbol(): string
    {
        return ' ';
    }
}