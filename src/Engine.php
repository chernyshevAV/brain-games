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

function getEven()
{
    $number = mt_rand(1, 100);
    line("Question: {$number}");
    return $number % 2 === 0 ? 'yes' : 'no';
}

function getCalc()
{
    $operators = ['+', '-', '*'];
    shuffle($operators);
    $firstNum = mt_rand(1, 20);
    $secondNum = mt_rand(1, 20);
    switch ($operators[0]) {
        case '+':
            line("Question: {$firstNum} + {$secondNum}");
            return $firstNum + $secondNum;
        case '-':
            line("Question: {$firstNum} - {$secondNum}");
            return $firstNum - $secondNum;
        case '*':
            $firstNum = mt_rand(1, 10);
            $secondNum = mt_rand(1, 10);
            line("Question: {$firstNum} * {$secondNum}");
            return $firstNum * $secondNum;
    }
}

function getGcd()
{
    $firstNum = mt_rand(1, 50);
    $secondNum = mt_rand(1, 50);
    line("Question: {$firstNum} {$secondNum}");
    while ($firstNum !== $secondNum) {
        if ($firstNum > $secondNum) {
            $firstNum = $firstNum - $secondNum;
        } else {
            $secondNum = $secondNum - $firstNum;
        }
    }
    return $firstNum;
}
/* decision #2: getGcd()
{
    $firstNum = mt_rand(1, 100);
    $secondNum = mt_rand(1, 100);
    line("Question: {$firstNum} {$secondNum}");
    if ($firstNum > $secondNum) {
        $temp = $firstNum;
        $firstNum = $secondNum;
        $secondNum = $temp;
    }
    for ($i = 1; $i < $firstNum + 1; $i++) {
        if ($firstNum % $i === 0 && $secondNum % $i === 0) {
            $gcd = $i;
        }
    }
    return $gcd;
*/
function getProgression()
{
    $randomStart = mt_rand(1, 20);
    $randomStep = mt_rand(2, 10);
    $digitColl = range(
        $randomStart,
        200,
        $randomStep
    );
    $exerciseSlice = array_slice($digitColl, 0, mt_rand(5, 10));
    $missingNumberIndex = mt_rand(0, count($exerciseSlice) - 1);
    $answer = $exerciseSlice[$missingNumberIndex];
    $exerciseSlice[$missingNumberIndex] = '..';
    $exerciseRow = implode(' ', $exerciseSlice);
    line("Question: {$exerciseRow}");
    return $answer;
}
