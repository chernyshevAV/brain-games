<?php

namespace Brain\Games\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\isAnswerCorrect;
use function Brain\Games\Engine\getGcd;

function brainGcd()
{
    $name = greeting();

    line('Find the greatest common divisor of given numbers.');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $correctAnswer = getGcd();
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
