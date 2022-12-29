<?php

$min = 1; 
$max = 50;
$num = rand($min, $max);
$guess = 12; //Change this value to test!

/* Create a way to give a feedback to the users, such that:
- if they guess correctly, you tell them
- if they guess incorrectly, you tell them if it was too high or too low
- as a bonus, also check to see if the guessed number is our of range*/



$message = match (true) {
    $guess < $min , $guess > $max => 'Your "guess" is out of range. Please choose between 1 and 50.',
    $guess < $num => 'Incorrect! your guess is too low.',
    $guess > $num => 'Incorrect! your guess is too high.',
    $guess == $num => 'Your guess is correct!',
};

echo "<p>$message</p>";