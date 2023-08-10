<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\FileDoesNotExistException;

interface TextRepositoryInterface
{
    /**
     * @throws FileDoesNotExistException
     */
    public function fetchLinesByPath(string $filePath): iterable;
}
