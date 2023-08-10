<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Reader\ExternalFileReader;
use App\Tests\Unit\TestDoubles\ExternalFileProviderStub;
use App\Tests\Unit\TestDoubles\FileReaderStub;
use PHPUnit\Framework\TestCase;

final class ExternalFileReaderTest extends TestCase
{
    private const STUB_CONTENT = '';
    private const STUB_FILEPATH = '';
    private const EXISTING_FILEPATH = __DIR__ . '/../../storage/example.txt';

    /** @test */
    public function shouldCallExternalFileProviderBecauseFileDoesNotExist(): void
    {
        // arrange
        $externalFileProvider = new ExternalFileProviderStub();
        $sut = new ExternalFileReader(
            $externalFileProvider,
            new FileReaderStub([self::STUB_CONTENT])
        );

        // act
        $sut->read(self::STUB_FILEPATH);

        // assert
        self::assertTrue($externalFileProvider->isWasCalled());
    }

    /** @test */
    public function shouldNotCallExternalFileProviderBecauseFileExists(): void
    {
        // arrange
        $externalFileProvider = new ExternalFileProviderStub();
        $sut = new ExternalFileReader(
            $externalFileProvider,
            new FileReaderStub([self::STUB_CONTENT])
        );

        // act
        $sut->read(self::EXISTING_FILEPATH);

        // assert
        self::assertFalse($externalFileProvider->isWasCalled());
    }
}
