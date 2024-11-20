<?php

namespace App\Calculator;

use App\Calculator\Calculator;

class CalculatorApp
{
    public function __invoke($args)
    {
        if (count($args) < 3 && $args[0] != 'cos') {
            echo "Usage: Deux nombres minimun et un operateur sont nécessaires\n";
            exit(1);
        }

        try {
            $calculator = new Calculator();

            $result = $calculator->calculate($args);

            echo "Résultat: " . $result . "\n";
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
            exit(1);
        }
    }
}
