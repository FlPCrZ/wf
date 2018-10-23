<?php
// function called "divide" 
    // that take in first parameter an integer to divide
    // and in second parameter, the divisor
function divide(int $dividend, int $divisor) : float{
    // If the divisor is zero, you must throw a RuntimeException.
    if ($divisor === 0){
        throw RuntimeException;
    }
    return $dividend / $divisor;
}

// second function called "arrayDivide"
// that take in first parameter an array of value to divide
// and in second parameter, the divisor
function arrayDivide(array $arrayValues, int $divisor) : array {
    $res = [];
// If the disor is zero, you must catch the exception and return the array of value, as it.
    foreach($arrayValues as $val){
        try {
            $res[] = divide($val, $divisor);
        } catch (Runtimeexception $e) {
            $res[] = $val;
        }
    }
    return $res;
}


