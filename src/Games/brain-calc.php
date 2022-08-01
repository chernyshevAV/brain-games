<?php

namespace Brain\Games\Games\Brain\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\isAnswerCorrect;

function brainCalc()
{
    $name = greeting();

    line('What is result of the expression?');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $randomNum1 = mt_rand(1, 20);
        $randomNum2 = mt_rand(1, 20);
        $randomExpression = mt_rand(1, 3);
        switch ($randomExpression) {
            case '1':
                line("Question: {$randomNum1} + {$randomNum2}");
                $correctAnswer = $randomNum1 + $randomNum2;
                break;
            case '2':
                line("Question: {$randomNum1} - {$randomNum2}");
                $correctAnswer = $randomNum1 - $randomNum2;
                break;
            case '3':
                line("Question: {$randomNum1} * {$randomNum2}");
                $correctAnswer = $randomNum1 * $randomNum2;
                break;
        }
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
