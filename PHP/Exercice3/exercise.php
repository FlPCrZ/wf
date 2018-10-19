<?php
$input;
$winner;
$pointsA = 0;
$pointsB = 0;

forEach($input as $row) {
    list($cardA, $cardB) = $row;
    if ($cardA > $cardB) {
        $pointsA += 1;
    } else if ($cardA < $cardB) {
        $pointsB += 1;
    }
}

if ($pointsA > $pointsB){
    $winner = 'A';
} else if ($pointsA < $pointsB) {
    $winner = 'B';
}
