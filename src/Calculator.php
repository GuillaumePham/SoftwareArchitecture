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

    private function getOperatorOrderNumber(string $operator): int
    {
        $OrderNumber = [
            '+' => 1,
            '-' => 1,
            '*' => 2,
            '/' => 2,
            'cos' => 3,
        ];

        if (!array_key_exists($operator, $OrderNumber)) {
            throw new \Exception("Opérateur non reconnu : $operator");
        }

        return $OrderNumber[$operator];
    }

    private function toPostfix(array $args): array
    {
        $output = [];
        $stack = [];

        foreach ($args as $arg) {
            if (is_numeric($arg)) {
                $output[] = $arg;
            } elseif ($arg === '(') {
                $stack[] = $arg;
            } elseif ($arg === ')') {
                while (!empty($stack) && end($stack) !== '(') {
                    $output[] = array_pop($stack);
                }
                array_pop($stack);
            } elseif (isset($this->operations[$arg])) {
                while (!empty($stack) && $this->getOperatorOrderNumber(end($stack)) >= $this->getOperatorOrderNumber($arg)) {
                    $output[] = array_pop($stack);
                }
                $stack[] = $arg;
            } else {
                throw new \Exception("Argument invalide : $arg");
            }
        }

        while (!empty($stack)) {
            $output[] = array_pop($stack);
        }

        return $output;
    }

    private function evaluatePostfix(array $postfix): float
    {
        $stack = [];

        foreach ($postfix as $token) {
            if (is_numeric($token)) {
                $stack[] = (float)$token;
            } elseif (isset($this->operations[$token])) {
                $b = array_pop($stack);
                $a = array_pop($stack);
                $result = $this->operations[$token]->calculate($a, $b);
                $stack[] = $result;
            } else {
                throw new \Exception("Token invalide : $token");
            }
        }

        return array_pop($stack);
    }

    public function calculate(array $args): float
    {
        $postfix = $this->toPostfix($args);
        return $this->evaluatePostfix($postfix);
    }
}
