<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator\CalculatorApp;

$app = new CalculatorApp();
$args = $argv;
array_shift($args);
$app($args);
