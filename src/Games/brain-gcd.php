<?php

namespace Brain\Games\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

function brainGcd()
{
    $name = greeting();

    line('Find the greatest common divisor of given numbers.');
    
    game($name, function()
    {
        $firstNum = mt_rand(1, 50);
        $secondNum = mt_rand(1, 50);
        line("Question: {$firstNum} {$secondNum}");
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
