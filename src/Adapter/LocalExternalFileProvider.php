<?php

declare(strict_types=1);

namespace App\Adapter;

final class LocalExternalFileProvider implements ExternalFileProviderInterface
{
    private const LOCAL_FILE_PATH = __DIR__ . '/../../storage/external-huge-example.txt';

    public function provide(string $filePath): void
    {
        copy(self::LOCAL_FILE_PATH, $filePath);
    }
}
