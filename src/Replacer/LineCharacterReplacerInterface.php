<?php

declare(strict_types=1);

namespace App\Replacer;

interface LineCharacterReplacerInterface
{
    public function replace(string $source): string;
}
