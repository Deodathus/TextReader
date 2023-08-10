<?php

declare(strict_types=1);

namespace App\Tests\Unit\TestDoubles;

use App\Exception\FileDoesNotExistException;
use App\Repository\TextRepositoryInterface;

final class TextRepositoryThrowingExceptionStub implements TextRepositoryInterface
{
    public function fetchLinesByPath(string $filePath): iterable
    {
        throw FileDoesNotExistException::withPath($filePath);
    }
}
