<?php

function buildPage($file)
{
    ob_start();
    ob_flush();

    $dir = __DIR__ . '/app/views/' . $file;

    include($dir);

    $result = ob_get_contents();

    $fileName = explode('.', $file)[0];

    // Create Dist. folder
    if (!is_dir(__DIR__ . '/docs/')) {
        mkdir(__DIR__ . '/docs/');
    }

    // Create goal dir
    if (!is_dir(__DIR__ . '/docs/' . $fileName)) {
        mkdir(__DIR__ . '/docs/' . $fileName);
    }

    if (is_file(__DIR__ . '/docs/' . $fileName . '/index.html')) {
        unlink(__DIR__ . '/docs/' . $fileName . '/index.html');
    }

    // Create file
    file_put_contents(__DIR__ . '/docs/' . $fileName . '/index.html', $result);
    
    // Create Index
    if ($file == 'index.php') {
        
        if (is_file(__DIR__ . '/docs/index.html')) {
            unlink(__DIR__ . '/docs/index.html');
        }

        file_put_contents(__DIR__ . '/docs/index.html', $result);
    }

    ob_end_clean();
    
    // echo $result;

}

// Scan all dir
$dirs = scandir(__DIR__ . '/app/views');

unset($dirs[0]);
unset($dirs[1]);

// var_dump($dirs);

foreach ($dirs as $dir) {
    buildPage($dir);
}
