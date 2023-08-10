<?php

declare(strict_types=1);

namespace App\Repository;

final readonly class HugeFileParsingStrategy implements FetchingStrategy
{
    public function fetchLines(string $sourcePath): iterable
    {
        try {
            $resource = fopen($sourcePath, 'r');

            while ($line = fgets($resource)) {
                yield $line;
            }
        } finally {
            fclose($resource);
        }
    }
}
