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
        file_put_contents($outputFilePath, '');

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