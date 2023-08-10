<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Exception\FileDoesNotExistException;
use App\Reader\FileReader;
use App\Tests\Unit\TestDoubles\TextRepositoryThrowingExceptionStub;
use PHPUnit\Framework\TestCase;

final class FileReaderTest extends TestCase
{
    private const FILE_PATH = '';

    /** @test */
    public function shouldThrowExceptionBecauseFileDoesNotExist(): void
    {
        // arrange
        $sut = new FileReader(
            new TextRepositoryThrowingExceptionStub()
        );

        // assert
        self::expectException(FileDoesNotExistException::class);

        // act
        $sut->read(self::FILE_PATH);
    }
}
