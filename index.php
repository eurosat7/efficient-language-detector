<?php
/** legal notice: https://github.com/nitotm/efficient-language-detector/blob/main/LEGAL.md */

declare(strict_types = 1);

namespace Nitotm\Eld;

include __DIR__ . "/vendor/autoload.php";

if (PHP_SAPI !== 'cli') {
    echo "<pre>";
}

$languageData = new LanguageData();
$languageSubset = new LanguageSet(
    languageData: $languageData,
    limitTo: ['de', 'en', 'fr', 'it'],
    usecache: false,
);
$languageDetector = new LanguageDetectorWithTools(
    languageData: $languageData,
    languageSubset: $languageSubset,
    returnScores: true,
);
$languageResult = $languageDetector->detect('Ich lebe in Berlin und esse gerne Sushi und Döner und Massaman Gai!');
$languageResult->dump();
