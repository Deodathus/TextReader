<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\FileDoesNotExistException;

final readonly class FileTextRepository implements TextRepositoryInterface
{
    private const SMALL_FILES_LIMIT = 22;
    public function __construct(
        private FetchingStrategy $smallFilesParsingStrategy,
        private FetchingStrategy $hugeFileParsingStrategy
    ) {}

    public function fetchLinesByPath(string $filePath): iterable
    {
        if (!file_exists($filePath)) {
            throw FileDoesNotExistException::withPath($filePath);
        }

        if (filesize($filePath) > self::SMALL_FILES_LIMIT) {
            return $this->hugeFileParsingStrategy->fetchLines($filePath);
        }

        return $this->smallFilesParsingStrategy->fetchLines($filePath);
    }
}
