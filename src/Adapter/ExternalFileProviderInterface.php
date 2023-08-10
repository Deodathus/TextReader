<?php

declare(strict_types=1);

namespace App\Adapter;

interface ExternalFileProviderInterface
{
    public function provide(string $filePath): void;
}
