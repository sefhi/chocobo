<?php

namespace App\Tests;

use App\Hello;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    #[Test]
    public function itShouldWork(): void
    {
        $hello = new Hello();
        $this->assertEquals('Test', $hello->test());
    }
}
