<?php
function addView(): void {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter';
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
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter';

    return file_get_contents($file);
}