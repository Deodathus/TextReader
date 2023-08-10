<?php

declare(strict_types=1);

namespace App\Reader;

use App\Adapter\ExternalFileProviderInterface;

final readonly class ExternalFileReader implements FileReaderInterface
{
    public function __construct(
        private ExternalFileProviderInterface $externalFileProvider,
        private FileReaderInterface $fileReader
    ) {}

    public function read(string $filePath): iterable
    {
        if (!file_exists($filePath)) {
            $this->externalFileProvider->provide($filePath);
        }

        return $this->fileReader->read($filePath);
    }
}
