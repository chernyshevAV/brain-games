<?php

namespace Brain\Games\Games\Brain\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\isAnswerCorrect;
use function Brain\Games\Engine\checkPrime;

function brainPrime()
{
    $name = greeting();

    line('Answer "yes" if given number is prime. Otherwise answer "no"');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $correctAnswer = checkPrime();
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
