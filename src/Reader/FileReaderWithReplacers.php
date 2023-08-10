<?php

declare(strict_types=1);

namespace App\Reader;

use App\Replacer\ReplacersCollection;

final readonly class FileReaderWithReplacers implements FileReaderInterface
{
    public function __construct(
        private FileReaderInterface $fileReader,
        private ReplacersCollection $replacers
    ) {}

    public function read(string $filePath): iterable
    {
        foreach ($this->fileReader->read($filePath) as $line) {
            $result = $line;

            foreach ($this->replacers->getReplacers() as $replacer) {
                $result = $replacer->replace($line);
            }

            yield $result;
        }
    }
}
