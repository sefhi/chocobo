<?php

namespace ChocoBilly;

use App\ChocoBilly\CalculateChoco;
use App\ChocoBilly\ChocoBilly;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ChocoBillyTest extends TestCase
{
    private string $outputFilePath;

    protected function setUp(): void
    {
        $this->outputFilePath = __DIR__ . '/outputTest.txt';
        $this->calculate = new CalculateChoco();
    }

    #[Test]
    public function itShouldReturnAnFileOutputCorrectly(): void
    {

        // GIVEN

        $inputFilePath  = __DIR__ . '/inputTest.txt';
        $outputFilePathExpected = __DIR__ . '/outputTestExpected.txt';

        // WHEN

        $chocoBilly = new ChocoBilly($this->calculate);
        ($chocoBilly)($inputFilePath, $this->outputFilePath);

        // THEN

        self::assertFileEquals($outputFilePathExpected, $this->outputFilePath);

    }

    protected function tearDown(): void
    {
        if (file_exists($this->outputFilePath)) {
            unlink($this->outputFilePath);
        }
    }

}
