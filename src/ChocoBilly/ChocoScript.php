<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use App\ChocoBilly\ChocoBilly;
use App\ChocoBilly\ChocoCalculate;

$inputFilePath = $argv[1];
$outputFilePath = $argv[2];

$calculateChoco = new ChocoCalculate();
$chocoBilly = new ChocoBilly($calculateChoco);

$chocoBilly($inputFilePath, $outputFilePath);

$exist = file_exists($outputFilePath);
if (false === $exist) {
    echo "Error creating file ❌";
}

echo "File output created successfully ✅" . PHP_EOL . PHP_EOL;
echo 'Input: ' . PHP_EOL . file_get_contents($inputFilePath) . PHP_EOL . PHP_EOL;
echo 'Output: '. PHP_EOL . file_get_contents($outputFilePath) . PHP_EOL;