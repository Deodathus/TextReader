<?php

declare(strict_types=1);

namespace App\Replacer;

final class ReplacersCollection
{
    /**
     * @param LineCharacterReplacerInterface[] $replacers
     */
    public function __construct(
        private array $replacers = []
    ) {}

    public function addReplacer(LineCharacterReplacerInterface $characterReplacer): void
    {
        $this->replacers[] = $characterReplacer;
    }

    /**
     * @return LineCharacterReplacerInterface[] $replacers
     */
    public function getReplacers(): array
    {
        return $this->replacers;
    }
}
