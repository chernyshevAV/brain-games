<?php

namespace Brain\Games\Brain\Calc;

use function cli\line;
use function cli\prompt;

function brainCalc()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line('Correct!');
            $wins += 1;
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $correctAnswer
            );
            return line("Let's try again, %s!", $name);
        }
    }
    line("Congratulations, %s!", $name);
}
