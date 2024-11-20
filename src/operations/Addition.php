<?php

namespace App\Calculator\Operations;

require_once 'OperationInterface.php';

class Addition implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        return $a + $b;
    }
}
