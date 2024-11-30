<?php

declare(strict_types=1);

namespace App\ChocoBilly;

final class CalculateChoco
{
    private const int MAX_WEIGHT = PHP_INT_MAX;

    public function calculateMinimumChocobos(int $weight, array $weightsAvailable): array
    {
        $count = $weight + 1;
        $minWeightAvailable  = array_fill(0, $count, self::MAX_WEIGHT);
        $combinations = array_fill(0, $count, []);

        $minWeightAvailable[0] = 0;

        for ($i = 1; $i <= $weight; $i++) {
            foreach ($weightsAvailable as $weightAvailable) {

                if ($i >= $weightAvailable && $minWeightAvailable[$i - $weightAvailable] != self::MAX_WEIGHT) {

                    $newCount = $minWeightAvailable[$i - $weightAvailable] + 1;

                    if ($minWeightAvailable[$i] > $newCount) {

                        $minWeightAvailable[$i]    = $newCount;
                        $combinations[$i]   = $combinations[$i - $weightAvailable];
                        $combinations[$i][] = $weightAvailable;
                    }
                }
            }
        }

        sort($combinations[$weight]);
        return $combinations[$weight];
    }
}