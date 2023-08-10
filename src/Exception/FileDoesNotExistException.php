<?php

declare(strict_types=1);

namespace App\Exception;

final class FileDoesNotExistException extends \Exception
{
    public static function withPath(string $path): self
    {
        return new self(
            sprintf(
                'File with given path does not exist! Given path: "%s"',
                $path
            )
        );
    }
}
