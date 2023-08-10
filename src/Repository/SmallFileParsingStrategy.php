<?php

declare(strict_types=1);

namespace App\Repository;

final readonly class SmallFileParsingStrategy implements FetchingStrategy
{
    public function fetchLines(string $sourcePath): iterable
    {
        try {
            $resource = fopen($sourcePath, 'r');

            $lines = [];

            while ($line = fgets($resource)) {
                $lines[] = $line;
            }

            return $lines;
        } finally {
            fclose($resource);
        }
    }
}
