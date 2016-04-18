<?php

var_dump($argc);
var_dump ($argv);

function game() {
    //game picks a random number between 1 and 100
    $random = mt_rand (1, 100);

    fwrite (STDOUT, "Can you guess what number I'm thinking of?\n");
    $guess = fgets(STDIN);

    $tries = 0;

    while ($guess != $random) {
        $tries++;
        if ($guess < $random) {
            fwrite (STDOUT, "higher! keep going:");
            $guess = fgets(STDIN) . PHP_EOL;  
        } else if ($guess > $random) {
            fwrite (STDOUT, "lower! keep going:");
            $guess = fgets(STDIN);
        } 
    }
    $tries++;
    fwrite (STDOUT, "Yep! Game over! It took you {$tries} tries!\n");
    again();
} 

function again() {
    fwrite (STDOUT, "Play? Type 1 for yes, 2 for no\n");

    $maybe = fgets(STDIN);

    if ($maybe == 1) {
        game();
    }else if ($maybe == 2) {
        echo("See you later!") . PHP_EOL;
    }
}
again();


