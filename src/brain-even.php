<?php

namespace Brain\Games\Brain\Even;

use function cli\line;
use function cli\prompt;

function brainEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $questionNum = rand(1, 100);
        line("Question: {$questionNum}");
        $answer = strtolower(prompt("Your answer"));
        $correctAnswer = $questionNum % 2 === 0 ? 'yes' : 'no';
        if ($answer === $correctAnswer) {
            line('Correct!');
            $wins += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", 
                $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
                $wins = 0;
        }
    }
    line("Congratulations, %s!", $name);
}