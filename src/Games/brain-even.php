<?php

namespace Brain\Games\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\isAnswerCorrect;

function brainEven()
{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $randomNum = mt_rand(1, 100);
        line("Question: {$randomNum}");
        $correctAnswer = $randomNum % 2 === 0 ? 'yes' : 'no';
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
