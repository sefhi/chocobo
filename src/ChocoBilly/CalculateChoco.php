<?php

declare(strict_types=1);

namespace App\ChocoBilly;

final class CalculateChoco
{
    private const int MAX_WEIGHT = PHP_INT_MAX;

    public function calculateMinimumChocobos(int $weight, array $chocobos): array
    {
        $minChocobos  = array_fill(0, $weight + 1, self::MAX_WEIGHT);
        $combinations = array_fill(0, $weight + 1, []);

        $minChocobos[0] = 0;

        for ($i = 1; $i <= $weight; $i++) {
            foreach ($chocobos as $chocoboWeight) {

                if ($i >= $chocoboWeight && $minChocobos[$i - $chocoboWeight] != self::MAX_WEIGHT) {

                    $newCount = $minChocobos[$i - $chocoboWeight] + 1;

                    if ($minChocobos[$i] > $newCount) {

                        $minChocobos[$i]    = $newCount;
                        $combinations[$i]   = $combinations[$i - $chocoboWeight];
                        $combinations[$i][] = $chocoboWeight;
                    }
                }
            }
        }

        sort($combinations[$weight]);
        return $combinations[$weight];
    }
}