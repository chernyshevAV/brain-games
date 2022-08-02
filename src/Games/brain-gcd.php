<?php

namespace Brain\Games\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

//find the greatest common divisor of two random numbers
function brainGcd()
{
    $name = greeting();

    line('Find the greatest common divisor of given numbers.');
    game($name, function () {
        $firstNum = mt_rand(1, 50);
        $secondNum = mt_rand(1, 50);
        line("Question: {$firstNum} {$secondNum}");
        /*
        Subtract the greater number from the lesser
        until they've become equal, received number is GCD
        */
        while ($firstNum !== $secondNum) {
            if ($firstNum > $secondNum) {
                $firstNum = $firstNum - $secondNum;
            } else {
                $secondNum = $secondNum - $firstNum;
            }
        }
        return $firstNum;
    });
}
