<?php

// ob_start();
// file_get_contents('https://google.com');

// $contents = ob_get_contents();
// ob_flush();
// ob_end_clean();

// file_put_contents('result.html', $contents);

$ch = curl_init(); 

// set url 
curl_setopt($ch, CURLOPT_URL, "localhost:3000/test.php");

// return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// $output contains the output string 
$output = curl_exec($ch); 

// tutup curl 
curl_close($ch);      

// menampilkan hasil curl
echo $output;

file_put_contents('res.html', $output);