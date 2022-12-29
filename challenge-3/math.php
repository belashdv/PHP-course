<?php
/**
 * Perform the following arithmethic operations in PHP and store them in an array. Then output all of the results.
 * A) (14 + 82 - 32 / 2)^2
 * B) 18 x (3 ÷ 6 -9) x 10
 * C) 5x (12 ÷2 -8 x 4 +12x6)
 * 
 * Be sure to use additional parentesis to get the right results! 
 */

$result = array(
    'A' => (14 + 82 - (32/2)) ** 2 , //should be A => 6400
    'B' => 18 * ((3/6) - 9) * 10 , //should be B => -1530 
    'C' => 5 * ((12/2) - (8*4) + (12*6)) , // should be C => 230

);

print_r($result);