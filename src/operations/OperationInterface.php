<?php

namespace App\Calculator\Operations;

interface OperationInterface
{
    public function calculate(float $a, float $b): float;
}
