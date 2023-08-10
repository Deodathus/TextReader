<?php

use App\Adapter\LocalExternalFileProvider;
use App\Reader\ExternalFileReader;
use App\Reader\FileReader;
use App\Reader\FileReaderWithReplacers;
use App\Replacer\EndlineCharacterReplacer;
use App\Replacer\ReplacersCollection;
use App\Repository\FileTextRepository;
use App\Repository\HugeFileParsingStrategy;
use App\Repository\SmallFileParsingStrategy;

require __DIR__ . '/../vendor/autoload.php';

$fileReader = new FileReader(
    new FileTextRepository(
        new SmallFileParsingStrategy(),
        new HugeFileParsingStrategy()
    )
);

$fileReaderWithReplacers = new FileReaderWithReplacers(
    $fileReader,
    new ReplacersCollection([
        new EndlineCharacterReplacer(),
    ])
);

$externalFileReader = new ExternalFileReader(
    new LocalExternalFileProvider(),
    $fileReader
);

foreach ($fileReaderWithReplacers->read(__DIR__ . '/../storage/example.txt') as $line) {
    echo $line;
}

foreach ($fileReader->read(__DIR__ . '/../storage/huge-example.txt') as $line) {
    echo $line;
}

foreach ($externalFileReader->read(__DIR__ . '/../storage/downloaded-external-huge-example.txt') as $line) {
    echo $line;
}
