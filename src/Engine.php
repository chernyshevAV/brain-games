<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function isAnswerCorrect($name, $correctAnswer)
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
