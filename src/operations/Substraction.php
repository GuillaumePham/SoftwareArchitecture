<?php

namespace App\Calculator\Operations;

require_once 'OperationInterface.php';

class Substraction implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        return $a - $b;
    }
}