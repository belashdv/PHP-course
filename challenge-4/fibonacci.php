<?php
/* Print every number in the Fibonacci Sequence without going over 200*/

$current = 1;
$previous = 0;
$next = null;
$limit = 200;

while ($current < $limit) {
    echo $current . ", ";
    $next = $current + $previous;
    $previous = $current;
    $current = $next;
}
?>