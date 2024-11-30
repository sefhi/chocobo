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
        $contentArr  = file($inputFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $caseNumbers = (int)array_shift($contentArr);

        $result = [];

        for ($i = 0; $i < $caseNumbers; $i++) {

            $positionWeightsAvailable = $i*2;
            $positionWeightExpected   = $i*2 + 1;
            $weightsAvailable         = explode(',', $contentArr[$positionWeightsAvailable]);
            $weightExpected           = $contentArr[$positionWeightExpected];

            $resultCombination = $this->calculate->combinationMinimumWeight(
                weight: (int)$weightExpected,
                weightsAvailable: $weightsAvailable
            );

            $result[] = count($resultCombination) . ':' . implode(',', $resultCombination);

        }

        $resultContent = implode(PHP_EOL, $result);
        file_put_contents($outputFilePath, $resultContent);

    }
}