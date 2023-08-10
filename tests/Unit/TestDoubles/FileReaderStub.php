<?php

declare(strict_types=1);

namespace App\Tests\Unit\TestDoubles;

use App\Reader\FileReaderInterface;

final readonly class FileReaderStub implements FileReaderInterface
{
    /**
     * @param string[] $fileContent
     */
    public function __construct(private array $fileContent) {}

    public function read(string $filePath): iterable
    {
        return $this->fileContent;
    }
}
