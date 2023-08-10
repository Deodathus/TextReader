<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

use App\Repository\SmallFileParsingStrategy;
use PHPUnit\Framework\TestCase;

final class SmallFilesParsingStrategyTest extends TestCase
{
    private const FILE_PATH = __DIR__ . '/../../../storage/example.txt';
    private const SEPARATOR = '';

    /** @test */
    public function shouldParseTheFileAndReturnContent(): void
    {
        // arrange
        $sut = new SmallFileParsingStrategy();

        // act
        $result = $sut->fetchLines(self::FILE_PATH);

        // assert
        self::assertSame(file_get_contents(self::FILE_PATH), implode(self::SEPARATOR, $result));
    }
}
