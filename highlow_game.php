<?php

function game() {
    
    global $argc, $argv;
    
    if ($argc == 3) {
        $random = mt_rand ($argv[1], $argv[2]);
    } else if ($argc == 1) {
        $random = mt_rand (1, 100);
    }

    fwrite (STDOUT, "Can you guess what number I'm thinking of?\n");
    $guess = fgets(STDIN);

    $tries = 0;

    while ($guess != $random) {
        $tries++;
        if ($guess < $random) {
            fwrite (STDOUT, "higher! keep going:");
            $guess = fgets(STDIN);  
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


