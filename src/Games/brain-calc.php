<?php

namespace Brain\Games\Games\Brain\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

//generate random expression and return its answer
function brainCalc()
{
    $name = greeting();

    line('What is result of the expression?');
    game($name, function () {
        $operators = ['+', '-', '*']; //create pool of operators
        shuffle($operators);
        $firstNum = mt_rand(1, 20);
        $secondNum = mt_rand(1, 20);
        /*
        compose the desired expression,
        depending on the shuffled operator
        */
        switch ($operators[0]) {
            case '+':
                line("Question: {$firstNum} + {$secondNum}");
                return $firstNum + $secondNum;
            case '-':
                line("Question: {$firstNum} - {$secondNum}");
                return $firstNum - $secondNum;
            case '*':
                $firstNum = mt_rand(1, 10); // range adjustment
                $secondNum = mt_rand(1, 10); // to reduce complexity
                line("Question: {$firstNum} * {$secondNum}");
                return $firstNum * $secondNum;
        }
    });
}
