<?php

declare(strict_types=1);

namespace App\Reader;

use App\Repository\TextRepositoryInterface;

final readonly class FileReader implements FileReaderInterface
{
    public function __construct(
        private TextRepositoryInterface $textRepository
    ) {}

    public function read(string $filePath): iterable
    {
        return $this->textRepository->fetchLinesByPath($filePath);
    }
}
