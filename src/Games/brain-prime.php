<?php

namespace Brain\Games\Games\Brain\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

//prime number check
function brainPrime()
{
    $name = greeting();

    line('Answer "yes" if given number is prime. Otherwise answer "no"');
    game($name, function () {
        $randomNumber = mt_rand(1, 100);
        line("Question: {$randomNumber}");
        //check: 1 is not a prime number
        if ($randomNumber === 1) {
            return 'no';
        }
        /*
        check that the prime number is not divisible
        by a smaller number without a remainder
        */
        for ($i = 2; $i < $randomNumber; $i++) {
            if ($randomNumber % $i === 0) {
                return 'no';
            }
        }
        return 'yes';
    });
}
