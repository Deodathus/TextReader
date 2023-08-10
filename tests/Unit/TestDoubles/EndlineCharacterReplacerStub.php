<?php

declare(strict_types=1);

namespace App\Tests\Unit\TestDoubles;

use App\Replacer\LineCharacterReplacerInterface;

final class EndlineCharacterReplacerStub implements LineCharacterReplacerInterface
{
    private bool $wasCalled = false;

    public function replace(string $source): string
    {
        $this->wasCalled = true;

        return $source;
    }

    public function isWasCalled(): bool
    {
        return $this->wasCalled;
    }
}
