<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function isAnswerCorrect(string $name, string $correctAnswer): bool
{
    $answer = strtolower(prompt("Your answer"));
    if ($answer == $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line(
            "'%s' is wrong answer ;(. Correct answer was '%s'.",
            $answer,
            $correctAnswer
        );
        return false;
    }
}

function game(string $name, callable $game): null
{
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) {
        $correctAnswer = $game();
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
