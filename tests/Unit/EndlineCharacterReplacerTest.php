<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Replacer\EndlineCharacterReplacer;
use PHPUnit\Framework\TestCase;

final class EndlineCharacterReplacerTest extends TestCase
{
    private const TEST_CASE = 'test      ';

    /** @test */
    public function shouldReplaceEndline(): void
    {
        // arrange
        $sut = new EndlineCharacterReplacer();

        // act
        $result = $sut->replace(self::TEST_CASE);

        // assert
        self::assertSame(trim(self::TEST_CASE) . PHP_EOL, $result);
    }
}
