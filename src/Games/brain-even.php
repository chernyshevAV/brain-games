<?php

namespace Brain\Games\Brain\Even;

use function cli\line;
use function cli\prompt;

function brainEven()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $randomNum = mt_rand(1, 100);
        line("Question: {$randomNum}");
        $answer = strtolower(prompt("Your answer"));
        $correctAnswer = $randomNum % 2 === 0 ? 'yes' : 'no';
        if ($answer === $correctAnswer) {
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
