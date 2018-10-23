<?php
function easterReverse($filePath){ 
    //You decide to create a function called "easterReverse" that take a file path as argument, 
    $content = file_get_contents($filepath);
    $secondPart = substr($content, floor(strlen($content) / 2));
    $firstPart = substr($content, 0 , strlen($secondPart) - 1);
    $file = fopen($filePath, 'r+');
    fseek($file, strlen($firstPart), SEEK_SET);
    //to reverse the second half part of the file.
    fwite($file, strrev($secondPart), strlen($secondpart));\
    fclose($file);
}


