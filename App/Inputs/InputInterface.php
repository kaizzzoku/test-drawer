<?php

namespace App\Inputs;

interface InputInterface
{
    public function parse($params);
}