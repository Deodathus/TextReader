<?php

declare(strict_types=1);

namespace App\Reader;

interface FileReaderInterface
{
    public function read(string $filePath): iterable;
}
