<?php

declare(strict_types=1);

namespace App\Replacer;

final readonly class EndlineCharacterReplacer implements LineCharacterReplacerInterface
{
    public function replace(string $source): string
    {
        return trim($source) . PHP_EOL;
    }
}
