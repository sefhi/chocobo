<?php

declare(strict_types=1);

namespace App\ChocoBilly;

final readonly class ChocoBilly
{

    public function __construct(
        private ChocoCalculate $calculate
    )
    {
    }

    public function __invoke(string $inputFilePath, string $outputFilePath): void
    {
//        $contentArr  = file($inputFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//        $numCases    = (int)array_shift($contentArr);
//
//        $result = [];
//
//        for ($i = 0; $i < $numCases; $i++) {
//
//            $positionWeightsAvailable = $i*2;
//            $positionWeightExpected   = $i*2 + 1;
//            $weightsAvailable         = explode(',', $contentArr[$positionWeightsAvailable]);
//            $weightExpected           = $contentArr[$positionWeightExpected];
//
//            $resultCombination = $this->calculate->combinationMinimumWeight(
//                weight: (int)$weightExpected,
//                weightsAvailable: $weightsAvailable
//            );
//
//            $result[] = count($resultCombination) . ':' . implode(',', $resultCombination);
//
//        }
//
//        $resultContent = implode(PHP_EOL, $result);
//        file_put_contents($outputFilePath, $resultContent);

        foreach ($this->readCases($inputFilePath) as $case) {
            [$weight, $weightsAvailable] = $case;
            $resultCombination = $this->calculate->combinationMinimumWeight(
                weight: $weight,
                weightsAvailable: $weightsAvailable
            );
            $lineResult = count($resultCombination) . ':' . implode(',', $resultCombination). PHP_EOL;
            file_put_contents($outputFilePath, $lineResult, FILE_APPEND);
        }

    }

    public function readCases(string $inputFile): \Generator
    {
        $lines = new \SplFileObject($inputFile);
        $numCases = (int)trim($lines->fgets());

        for ($i = 0; $i < $numCases; $i++) {
            $weightsAvailable = explode(',', trim($lines->fgets()));
            $weight = (int)trim($lines->fgets());
            yield [$weight, $weightsAvailable];
        }
    }
}