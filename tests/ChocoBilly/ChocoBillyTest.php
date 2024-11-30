<?php

namespace ChocoBilly;

use App\ChocoBilly\ChocoBilly;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ChocoBillyTest extends TestCase
{
    #[Test]
    public function itShouldReturnAnFileOutputCorrectly(): void
    {

        // GIVEN

        $inputFilePath  = __DIR__ . '/inputTest.txt';
        $outputFilePath = __DIR__ . '/outputTest.txt';

        $outputFilePathExpected = __DIR__ . '/outputTestExpected.txt';

        // WHEN

        $chocoBilly = new ChocoBilly();
        $output = ($chocoBilly)($inputFilePath, $outputFilePath);

        // THEN

        self::assertFileEquals($outputFilePathExpected, $outputFilePath);

    }

}
