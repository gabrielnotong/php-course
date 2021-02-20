<?php
function addView(): void {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . 'counter';
    $todayFile = $file . date('Y-m-d');

    increment($file);
    increment($todayFile);
}

function increment(string $file) {
    $counter = 1;
    if (file_exists($file)) {
        $counter = (int)file_get_contents($file);
        $counter++;
    } 
    file_put_contents($file, $counter);
}

function numberOfViews(): string {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . 'counter';

    return file_get_contents($file);
}

function numberOfViewsPerMonth(int $year, int $month): int {
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR .  'counter' . $year . '-' . $month . '-*';
    $total = 0;
    $files = glob($filePath);
    foreach($files as $file) {
        $content = file_get_contents($file);
        $total += (int)$content;
    }
    return $total;
}

function numberOfViewsPerMonthDetails(int $year, int $month): array {
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR .  'counter' . $year . '-' . $month . '-*';
    $files = glob($filePath);
    $results = [];
    foreach($files as $file) {
        $array = explode('-', basename($file));
        $results[] = [
           'day' => $array[2] . '/' . $array[1],
           'visites' => file_get_contents($file),
        ];
    }
    return $results;
}