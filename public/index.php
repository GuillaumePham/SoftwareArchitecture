<?php
use App\Calculator\CalculatorApp;
require_once __DIR__ . '/../vendor/autoload.php';

$app = new CalculatorApp();
$args = $argv;
array_shift($args);
$app($args);

