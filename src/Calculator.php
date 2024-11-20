<?php

namespace App\Calculator;

use App\Calculator\Operations\Addition;
use App\Calculator\Operations\Substraction;
use App\Calculator\Operations\Multiplication;
use App\Calculator\Operations\Division;
use App\Calculator\Operations\Cosinus;

class Calculator
{
    private $operations = [];

    public function __construct()
    {
        $this->operations = [
            '+' => new Addition(),
            '-' => new Substraction(),
            '*' => new Multiplication(),
            '/' => new Division(),
            'cos' => new Cosinus(),
        ];
    }

    public function calculate(array $args): float
    {
        $result = (float)array_shift($args);

        while (count($args) > 1) {
            $operator = array_shift($args);
            $number = (float)array_shift($args);

            if (!isset($this->operations[$operator])) {
                throw new \Exception("Opérateur invalide : $operator");
            }

            $result = $this->operations[$operator]->calculate($result, $number);
        }

        return $result;
    }
}
