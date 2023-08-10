<?php

declare(strict_types=1);

namespace App\Repository;

interface FetchingStrategy
{
    public function fetchLines(string $sourcePath): iterable;
}
