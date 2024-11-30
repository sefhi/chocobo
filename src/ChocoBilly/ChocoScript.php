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