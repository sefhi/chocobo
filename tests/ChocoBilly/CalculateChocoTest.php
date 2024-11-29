<?php

declare(strict_types=1);

namespace App\Tests\ChocoBilly;

use App\ChocoBilly\CalculateChoco;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CalculateChocoTest extends TestCase
{
    public static function provideData(): \Iterator
    {
        yield 'When weight is 6 and chocobos are 2 and 3, then minimum number of chocobos is 3 and 3' => [
            6,
            [2,3],
            [3, 3]
        ];

        yield 'When weight is 3 and chocobos are 1 and 2, then minimum number of chocobos is 1 and 2' => [
            3,
            [1,2],
            [1,2]
        ];

        yield 'When weight is 5 and chocobos are 2 and 3, then minimum number of chocobos is 2 and 3' => [
            5,
            [2,3],
            [2,3]
        ];

        yield 'When weight is 9 and chocobos are 1, 2 and 3, then minimum number of chocobos is 1, 2, 2, 2 and 2' => [
            9,
            [1,2],
            [1,2,2,2,2]
        ];
    }

    #[Test]
    #[DataProvider('provideData')]
    public function itShouldCalculateMinimumNumberChocobosPerWeight(
        int $weight,
        array $chocobos,
        array $minimumChocobosExpected
    ): void
    {
        // WHEN

        $calculateChocobo = new CalculateChoco();

        // THEN

        self::assertEquals(
            $minimumChocobosExpected,
            $calculateChocobo->calculateMinimumChocobos($weight, $chocobos)
        );
    }
}