<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

// function to find out and save the username
function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
//get user's answer and compare it with correct answer
function isAnswerCorrect(string $name, string $correctAnswer): bool
{
    $answer = strtolower(prompt("Your answer"));
    if ($answer === $correctAnswer) {
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
//core game logic
function game(string $name, callable $game)
{
    $winStreakToWin = 3;
    $wins = 0;

    while ($wins < $winStreakToWin) { //win counter
        /*
        calling a specific game as a callback function
        to display game questions to the user and get correct answer
        */
        $correctAnswer = $game();
        // get the user's answer and check it
        if (isAnswerCorrect($name, $correctAnswer)) {
            $wins += 1;
        } else {
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
