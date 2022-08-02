<?php

namespace Brain\Games\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\isAnswerCorrect;
use function Brain\Games\Engine\getEven;

function brainEven()
{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $correctAnswer = getEven();
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
