<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Reader\FileReaderWithReplacers;
use App\Replacer\ReplacersCollection;
use App\Tests\Unit\TestDoubles\EndlineCharacterReplacerStub;
use App\Tests\Unit\TestDoubles\FileReaderStub;
use PHPUnit\Framework\TestCase;

final class FileReaderWithReplacersTest extends TestCase
{
    private const TEST_CASE = 'test   ';
    private const FILE_PATH = '';
    private const SEPARATOR = '';

    /** @test */
    public function shouldReturnTheSameStringBecauseNoReplacersWerePassed(): void
    {
        // arrange
        $sut = new FileReaderWithReplacers(
            new FileReaderStub([self::TEST_CASE]),
            new ReplacersCollection()
        );

        // act
        $generator = $sut->read(self::FILE_PATH);
        $result = [];
        foreach ($generator as $value) {
            $result[] = $value;
        }

        // assert
        self::assertSame(self::TEST_CASE, implode(self::SEPARATOR, $result));
    }

    /** @test */
    public function shouldCallEndlineReplacer(): void
    {
        // arrange
        $endlineCharacterReplacer = new EndlineCharacterReplacerStub();
        $sut = new FileReaderWithReplacers(
            new FileReaderStub([self::TEST_CASE]),
            new ReplacersCollection([
                $endlineCharacterReplacer,
            ])
        );

        // act
        /** @var \Generator $result */
        $result = $sut->read(self::FILE_PATH);
        $result->next();

        // assert
        self::assertTrue($endlineCharacterReplacer->isWasCalled());
    }
}
