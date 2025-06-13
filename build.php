<?php

function buildPage($file)
{
    ob_start();
    ob_flush();

    $dir = __DIR__ . '/app/views/' . $file;
    require_once($dir);

    $result = ob_get_contents();

    $fileName = explode('.', $file)[0];

    mkdir(__DIR__ . '/docs/' . $fileName);

    file_put_contents(__DIR__ . '/docs/' . $fileName . '/index.html', $result);

    ob_end_clean();
}

$dirs = scandir(__DIR__ . '/app/views');

unset($dirs[0]);
unset($dirs[1]);

// var_dump($dirs);

foreach ($dirs as $dir) {
    buildPage($dir);
}
