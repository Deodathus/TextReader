<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

use App\Repository\HugeFileParsingStrategy;
use PHPUnit\Framework\TestCase;

final class HugeFileParsingStrategyTest extends TestCase
{
    private const FILE_PATH = __DIR__ . '/../../../storage/huge-example.txt';
    private const SEPARATOR = '';

    /** @test */
    public function shouldParseTheFileAndReturnContent(): void
    {
        // arrange
        $sut = new HugeFileParsingStrategy();

        // act
        $generator = $sut->fetchLines(self::FILE_PATH);

        // assert
        $result = [];
        foreach ($generator as $value) {
            $result[] = $value;
        }

        self::assertSame(file_get_contents(self::FILE_PATH), implode(self::SEPARATOR, $result));
    }
}
