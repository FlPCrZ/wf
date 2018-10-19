<?php
$password;
$salt;

$temp1 = substr(
    $password, 
    0, 
    floor(strlen($password) / 2) + (strlen($password) / 2)
    );

$temp2 = substr(
    $password, 
    floor(strlen($password) / 2)
    );

$saltedPassword = "$temp1$salt$temp2";
