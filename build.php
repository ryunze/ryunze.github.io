<?php

$res = ['vcard-maker'];

function __runbuild($file)
{
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "localhost:3000/" . $file . ".php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    $output = curl_exec($ch); 
    curl_close($ch);      
    echo $output;

    file_put_contents(__DIR__ . "/tools/" . $file . ".html", $output);
}

foreach ($res as $f)
{
    __runbuild($f);
}