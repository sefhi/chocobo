<?php

declare(strict_types=1);

namespace App\ChocoBilly;

final class ChocoCalculate
{
    private const int MAX_WEIGHT = PHP_INT_MAX;

    public function combinationMinimumWeight(int $weight, array $weightsAvailable): array
    {
        $weightsAvailable = array_filter($weightsAvailable, fn($w) => $w <= $weight);
        rsort($weightsAvailable);

        $count = $weight + 1;
        $minWeightAvailable = array_fill(0, $count, self::MAX_WEIGHT);
        $prevWeight = array_fill(0, $count, null);

        $minWeightAvailable[0] = 0;

        for ($i = 1; $i <= $weight; $i++) {
            foreach ($weightsAvailable as $weightAvailable) {
                if ($i >= $weightAvailable && $minWeightAvailable[$i - $weightAvailable] != self::MAX_WEIGHT) {
                    $newCount = $minWeightAvailable[$i - $weightAvailable] + 1;

                    if ($minWeightAvailable[$i] > $newCount) {
                        $minWeightAvailable[$i] = $newCount;
                        $prevWeight[$i] = $weightAvailable;
                    }
                }
            }
        }

        $result = [];
        $currentWeight = $weight;

        while ($currentWeight > 0 && $prevWeight[$currentWeight] !== null) {
            $result[] = $prevWeight[$currentWeight];
            $currentWeight -= $prevWeight[$currentWeight];
        }

        sort($result);
        return $result;
    }
}