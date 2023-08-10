<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

use App\Exception\FileDoesNotExistException;
use App\Repository\FileTextRepository;
use App\Tests\Unit\TestDoubles\HugeFileParsingStrategyStub;
use App\Tests\Unit\TestDoubles\SmallFileParsingStrategyStub;
use PHPUnit\Framework\TestCase;

final class FileTextRepositoryTest extends TestCase
{
    private const SMALL_FILE_PATH = __DIR__ . '/../../../storage/example.txt';
    private const HUGE_FILE_PATH = __DIR__ . '/../../../storage/huge-example.txt';
    private const NON_EXISTING_PATH = __DIR__ . 'test.txt';

    /** @test */
    public function shouldCallSmallFileStrategy(): void
    {
        // arrange
        $smallFileParsingStrategy = new SmallFileParsingStrategyStub();
        $hugeFileParsingStrategy = new HugeFileParsingStrategyStub();

        $sut = new FileTextRepository(
            $smallFileParsingStrategy,
            $hugeFileParsingStrategy
        );

        // act
        $sut->fetchLinesByPath(self::SMALL_FILE_PATH);

        // assert
        self::assertTrue($smallFileParsingStrategy->isWasCalled());
        self::assertFalse($hugeFileParsingStrategy->isWasCalled());
    }

    /** @test */
    public function shouldCallHugeFileStrategy(): void
    {
        // arrange
        $smallFileParsingStrategy = new SmallFileParsingStrategyStub();
        $hugeFileParsingStrategy = new HugeFileParsingStrategyStub();

        $sut = new FileTextRepository(
            $smallFileParsingStrategy,
            $hugeFileParsingStrategy
        );

        // act
        $sut->fetchLinesByPath(self::HUGE_FILE_PATH);

        // assert
        self::assertTrue($hugeFileParsingStrategy->isWasCalled());
        self::assertFalse($smallFileParsingStrategy->isWasCalled());
    }

    /** @test */
    public function shouldNotCallAnyStrategyBecauseFileDoesNotExist(): void
    {
        // arrange
        $smallFileParsingStrategy = new SmallFileParsingStrategyStub();
        $hugeFileParsingStrategy = new HugeFileParsingStrategyStub();

        $sut = new FileTextRepository(
            $smallFileParsingStrategy,
            $hugeFileParsingStrategy
        );

        // assert
        self::expectException(FileDoesNotExistException::class);

        // act
        $sut->fetchLinesByPath(self::NON_EXISTING_PATH);
    }
}
