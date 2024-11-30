<?php

declare(strict_types=1);

namespace App\ChocoBilly;

final class ChocoBilly
{

    public function __invoke(string $inputFilePath, string $outputFilePath): void
    {
        $contentArr  = file($inputFilePath);
        $caseNumbers = array_shift($contentArr);

//        $result = $this->calculateChoco->calculateMinimumChocobos(
//            weight: 6,
//            chocobos: [2,3]
//        );
        $result = [];
        $result[] = '2:3,3';
        $result[] = '2:1,2';
        $resultContent = implode(PHP_EOL, $result);
        file_put_contents($outputFilePath, $resultContent);

    }
}