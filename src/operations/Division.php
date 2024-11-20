<?php

namespace App\Calculator\Operations;

require_once 'OperationInterface.php';

class Division implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \Exception("Erreur : division par zéro.");
        }
        return $a / $b;
    }
}
