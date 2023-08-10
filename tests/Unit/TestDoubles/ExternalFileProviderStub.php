<?php

declare(strict_types=1);

namespace App\Tests\Unit\TestDoubles;

use App\Adapter\ExternalFileProviderInterface;

final class ExternalFileProviderStub implements ExternalFileProviderInterface
{
    private bool $wasCalled = false;

    public function provide(string $filePath): void
    {
        $this->wasCalled = true;
    }

    public function isWasCalled(): bool
    {
        return $this->wasCalled;
    }
}
