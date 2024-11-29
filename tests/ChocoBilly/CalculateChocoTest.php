<?php

declare(strict_types=1);

namespace App\Tests\ChocoBilly;

use App\ChocoBilly\CalculateChoco;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CalculateChocoTest extends TestCase
{
    #[Test]
    public function itShouldCalculateMinimumNumberChocobosPerWeight(): void
    {
        // GIVEN

        $weight = 6;
        $chocobos = [2,3];
        $minimumChocobosExpected = [2,3];

        // WHEN

        $calculateChocobo = new CalculateChoco();

        // THEN

        self::assertEquals(
            $minimumChocobosExpected,
            $calculateChocobo->calculateMinimumChocobos($weight, $chocobos)
        );
    }
}