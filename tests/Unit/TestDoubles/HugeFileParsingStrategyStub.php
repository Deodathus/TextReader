<?php

declare(strict_types=1);

namespace App\Tests\Unit\TestDoubles;

use App\Repository\FetchingStrategy;

final class HugeFileParsingStrategyStub implements FetchingStrategy
{
    private bool $wasCalled = false;

    public function fetchLines(string $sourcePath): iterable
    {
        $this->wasCalled = true;

        return [];
    }

    public function isWasCalled(): bool
    {
        return $this->wasCalled;
    }
}
